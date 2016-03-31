burlang.ru
==========

Installation
------------

### 1. Install dependencies

You can then install this application template using the following command:

```
composer global require "fxp/composer-asset-plugin"
composer install
```

### 2. Initialize configs

Run `init` in the root directory. Choose development environment.

### 3. Database

By this moment you should have `config/param-local.php`. Specify your database connection there.

####  3.1. Migration

```
php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
php yii migrate
```

