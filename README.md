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
php yii migrate/up --migrationPath=@yii/rbac/migrations
php yii migrate/up --migrationPath=@app/rbac/migrations
php yii migrate
```

#### 3.2. Create user

```
php yii user/create <email> <username> [password] [...options...]
```

### 4. Rbac configuration

Run `php yii my-rbac/init` - generate default roles and permissions.

#### 4.1. Assign role

```
php yii my-rbac/assign <role> <username> 
```

### 5. Build

Run `gulp build` - automatically build target CSS/JS files

