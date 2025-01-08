<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravelsu\Highlight\CommonMark\HighlightExtension;
use Symfony\Component\Yaml\Yaml;

class Docs
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = "/$path.md";
    }

    /**
     * @param string $view
     *
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function view(string $view)
    {
        $page = Storage::disk('docs')->get($this->path);

        $variables = Str::of($page)->after('---')->before('---');

        $variables = Yaml::parse($variables);

        $all = collect()->merge($variables)->merge([
            'content' => Str::of($page)->after('---')->after('---')->markdown(
                extensions: [new HighlightExtension()]
            ),
            'edit'    => $this->editLinkGitHub(),
        ]);

        return view($view, $all);
    }

    /**
     * @return string
     */
    protected function editLinkGitHub()
    {
        return "https://github.com/sajya/sajya.github.io/edit/master/docs$this->path";
    }
}
