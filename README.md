# EcoLife Plastic Waste Reduction Web App

EcoLife is a multi-page CMS web site that helps users reduce plastic products consumption by providing practical advice that is delivered in a gamified manner.

# The Code: Laravel CMS using Vanilla PHP Views

A few notes regarding the CMS:

The CMS uses the public storage driver, make sure to update the .env file to:

```php
FILESYSTEM_DRIVER=public
```

To create the symbolic link, use the storage:link Artisan command:

```
php artisan storage:link
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
