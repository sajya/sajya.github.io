---
title: Docs Generator
description: Automatic generation of APIs documentation for JSON-RPC 2.0
extends: _layouts.documentation
section: content
---


## Usage

Documentation creation based on php attribute `Sajya\Server\Attributes\RpcMethod`:

```php
declare(strict_types=1);

namespace App\Http\Procedures;

use Illuminate\Http\Request;
use Sajya\Server\Procedure;
use Sajya\Server\Attributes\RpcMethod;

class MathProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'math';

    #[RpcMethod(
        description: "Performs a subtraction operation",
        params: [
            "minuend" => "int",
            "subtrahend" => "int",
        ],
        result: [
            "outcome" => "int",
        ]
    )]
    public function subtract(Request $request): array
    {
        return [
            'outcome' => $request->get('minuend') - $request->get('subtrahend'),
        ];
    }
}
```

----


## Generating HTML

Run the documentations generator command from the root directory:

```php
php artisan sajya:docs 'Route name'
```

By default, the file will be saved `storage/app/api/docs.html`, but you can change both path and filename with options:

```php
php artisan sajya:docs rpc.endpoint --path='/api/v1/' --name="index.html"
```
