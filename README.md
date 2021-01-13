# Laravel Pretty Pagination

This package generates pretty pagination URLs:

```
http://localhost/users/page/2
```

## Install

Install this package via Composer:

```
composer require ctsoft/laravel-pretty-pagination
```

## Usage

To generate pretty URLs simply call the ```paginate()``` macro on your routes:

```php
Route::get('/users', ...)->name('users')->paginate();
```

If you wan't to change the prefix (default is ```page```):

```php
Route::get('/users', ...)->name('users')->paginate('seite');
```

Or if you don't want to use any prefix:

```php
Route::get('/users', ...)->name('users')->paginate(null);
```

## Notes

- The route must have a name
- The ```paginate()``` macro must be called as last

## Security

If you discover any security related issues, please email [security@ctsoft.de](mailto:security@ctsoft.de) instead of using the issue tracker.

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
