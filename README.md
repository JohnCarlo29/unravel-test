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

STRIPE_KEY=pk_test_51IQd78HMlbRjqKZps4Xf4u68gcmiOw6Iq09PYHh8yJun2jhvGkn1AaJy0cL6AkTPgiIwb19cnUHMzY6hewFG0BgW00wSCKyfDZ
STRIPE_SECRET=sk_test_51IQd78HMlbRjqKZp3cW37V5jqUrXyBkPyCdOMjMUUj25kk9uAb3H76ksaXkPCULakWFVZPem2JmenWW0yD7VYhd800p5WUrA0q
```

### After Setting up the database connection

```
composer install
npm install && npm run dev
php artisan migrate:fresh --seed
php artisan serve
```

### Login Url

```
admin login url: localhost/admin/login
customer login url: localhost/login
```

##### **** Note: After running the commands, Please take a look on users table to get a login credential of user. For admin credential just loon on admins table. The default password is "password" without quote **** 


##### **** Note: the dummy data of transactions will be not match to the breakdowns of products and quantity, that is because is for populating only the database **** 
