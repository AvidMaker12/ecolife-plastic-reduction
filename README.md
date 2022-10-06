# Laravel CMS using Vanilla PHP Views

This repository is copy of the simple [PHP CMS](https://github.com/codeadamca/php-cms) except the CMS has been converted to Laravel. 

A few notes regarding the CMS:

The CMS uses the public storage driver, make sure to update your .env file to:

```php
FILESYSTEM_DRIVER=public
```

The database setup includes migrations and seeding. Run the following command to initialize the database:

```
php artisan migrate:refresh --seed
```

All user acocunts will have the default password of "password".

## Requirements:

* [Visual Studio Code](https://code.visualstudio.com/) or [Brackets](http://brackets.io/) (or any code editor)
* [Laravel](https://laravel.com/)

</a>
