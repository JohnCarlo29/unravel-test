# Unravel Studios Exam

a examination for backend developer

### Pre-requisite

1. Atleast Nodejs 12.13.0 or higher installed
2. Atlease php 7.3 or higher installed

### Initial Step

1. Copy `.env.example` to `.env` in root directory
2. Update the following values

```
# Set Database Credentials 
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

```

### After Setting up the database connection

```
composer install
npm install && npm run dev
php artisan migrate:fresh --seed
php artisan serve
```
