burlang.ru
==========

Installation
------------

### 1. Install dependencies

You can then install this application template using the following command:

```bash
composer install
```

### 2. Initialize configs

Run `init` in the root directory. Choose development environment.

### 3. Database

By this moment you should have `config/param-local.php`. Specify your database connection there.

####  3.1. Migration

```bash
php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
php yii migrate/up --migrationPath=@yii/rbac/migrations
php yii migrate/up --migrationPath=@app/rbac/migrations
php yii migrate
```

### 4. Create user

```bash
php yii user/create <email> <username> [password]
```

### 5. Role configuration

#### 5.1. Adds role to user

```bash
php yii roles/assign
```

#### 5.2 Removes role from user

```bash
php yii roles/revoke
```

### 6. Build target CSS/JS files

- `npm run build`
- `npm run build-dev`

### 7. PHPCS fixer

```
composer phpcs-fixer
```
