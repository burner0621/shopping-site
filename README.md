# ecommerce-website in laravel-fullstack

## Features

-   Fully functional E-commerce website front-end and back-end built from scratch.
-   Using laravel voyager as an admin panel for the site.
-   javascript, jquery, bootstrap and css for the front-end.
-   Intelligent searching mechanism for products.
-   Awesome Cart package that uses session.
-   An artisan command to seed the database with all neccessary dummy data, even for voyager tables (php artisan ecommerce:install).
-   Different user roles and privileges.
-   Categories, tags and price filtering for easier search for products.
-   And much more features.

---

## Installation Guide

1. clone this repo to your local machine: `git clone https://github.com/sasapapovic988/shopping-site.git && cd shopping-site`
1. copy `.example.env` to `.env` file: `cp .example.env .env`
1. create a new database and add the database credentials to your `.env` file
1. run `composer install`
1. run `npm install && npm run dev`
1. run `php artisan key:generate`
1. run `php artisan ecommerce:install`
1. run `php artisan serve` and then visit `http://127.0.0.1:8000/`
1. credentials to access admin panel (email: `admin@admin.com`, password: `password`)
1. after you login as admin, you can access the admin page from `http://127.0.0.1:8000/admin`
-   Home Page

![Screenshot (35)](https://user-images.githubusercontent.com/39973541/68545143-e8aeb280-03d2-11ea-8bb1-1c245150e432.png)

-   Shopping Page

![Screenshot (36)](https://user-images.githubusercontent.com/39973541/68545195-5bb82900-03d3-11ea-801f-40d1f8c3334a.png)

-   Cart Page

![Screenshot (37)](https://user-images.githubusercontent.com/39973541/68545206-82765f80-03d3-11ea-8c5d-95ce0fc68e83.png)

-   Checkout page

![Screenshot (38)](https://user-images.githubusercontent.com/39973541/68545217-9a4de380-03d3-11ea-8a97-18057d9ea3f2.png)

-   Admin Orders BREAD

![Screenshot (33)](https://user-images.githubusercontent.com/39973541/68546326-ab035700-03dd-11ea-860c-7912775e2359.png)

-   Admin Products BREAD

![Screenshot (34)](https://user-images.githubusercontent.com/39973541/68546338-d4bc7e00-03dd-11ea-9934-4c7329435f8a.png)
