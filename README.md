## App description

Database structure is single table 'products'. Table columns can be found in migrations folder /database/migrations/2025_03_25_100529_create_products_table.php.
Products test rows can be automatically generated with seeder.
Default page redirects to products cards page where there are 15 products per page. There is a create product page and edit product page.
Deleting works by softdelete.
Filters and sort work with basic form request.
Exporting uses same filters as are currently applied.
Simple test cases have been implemented.

## How to run dev.
create database and setup database connection in .env

## Run commands

composer install
php artisan db:seed --class=ProductSeeder
composer run dev

## The app will run on http://127.0.0.1:8000/

## To run tests.

php artisan test

