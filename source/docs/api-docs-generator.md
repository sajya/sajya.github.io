---
title: API Docs Generator
description: Automatic generation of APIs documentation for JSON-RPC 2.0
extends: _layouts.documentation
section: content
---

# API Docs Generator

## Usage

Documentation creation based on phpdoc annotations:

```php
declare(strict_types=1);

namespace App\Http\Procedures;

use Sajya\Server\Annotations\Param;
use Sajya\Server\Annotations\Result;
use Sajya\Server\Procedure;

class MathProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'math';

    /**
     * Execute the procedure.
     *
     * @Param(name="minuend", value="required|integer")
     * @Param(name="subtrahend", value="required|integer")
     *
     * @Result(name="outcome", value="required|integer")
     */
    public function subtract(int $minuend, int $subtrahend): array
    {
        return [
            'outcome' => $minuend - $subtrahend,
        ];
    }
}
```

Using annotations `Param` and `Result`, you can specify the expected key's name and description.

> **Note.** Importing annotation classes is required.

To specify array elements or nesting, use dot notation, for example:

```php
@Param(name="server.title", value="required|string|max:255")
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
