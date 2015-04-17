# Properties
A framework agnostic package to model EAV (Entity Attribute Value) around your objects.

## Supported Data Types

| Data Type |  Note |
|-----------|------|
| Varchar   | text value that's less than 255 in length|
| Text | text value that's more than 255 in length|
| Integer| length is restricted to 11 by default |
|Decimal |length is defined as 14,2 |

## Table of Contents

- <a href="#installation">Installation</a>
    - <a href="#composer">Composer</a>
    - <a href="docs/laravel4-installation.md">Laravel 4</a>
- <a href="#usage">Usage</a>
	- <a href="docs/data-types.md">Supported Data Types</a>
	- <a href="docs/laravel4-usage.md">Laravel 4 - General Usage</a>
- <a href="#todos">Todos</a>
- <a href="#license">License</a>

## Composer

Add `moon/properties` in your "require" section of composer.json.

```json
"moon/properties": "1.0"
```

Run `composer update` to install the package.

## Todos

* Make it possible to search by properties

## License

Properties is released under the [MIT](http://opensource.org/licenses/MIT) license.