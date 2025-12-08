# The Boys Marketplace – Laravel Web Programming Project

This repository contains a small e-commerce web application built with **Laravel 11** as part of a **Web Programming** course.

The main Laravel application lives in:

```bash
/WebProg/TheBoysMarketplace
Users can browse products, manage a shopping cart, and update their account. Admins can manage products, categories, and user roles via a protected dashboard.

Tech Stack

Backend: PHP 8.2+, Laravel 11

Frontend: Blade templates, Bootstrap 5 (CDN)

Database: MySQL / MariaDB

Tooling:

Composer

Node.js + npm (installed but not required for running the current UI)

Vite 6, Tailwind CSS 3 (configured but unused in current UI)

Features
Public / Guest

View home page with product listing (/)

Search products by name

Filter products by category

View product details:

Guest: /products/{id}

User: /u/{username}/products/{id}

Authentication

Register: /register

Login: /login

Logout: /logout

Role support: user, admin

URL slugs based on Str::slug(name):

Users: /u/{username}

Admins: /a/{username}

Middleware:

auth.user — ensures {username} matches logged-in user

admin — ensures admin access and slug match

User Area

Home: /u/{username}

Cart:

View: /u/{username}/cart

Add: /u/{username}/cart/add/{product}

Update quantity: /u/{username}/cart/items/{item}/update

Checkout: /u/{username}/cart/checkout

Stock validation on add/update/checkout

Account:

View: /u/{username}/account

Update (password confirmation required)

Delete (password confirmation required)

Admin Area
Admin Home

/a/{username}

Admin Dashboard

/a/{username}/admin
Includes:

Product count

Category count

Admin count

Category list

Users available for admin promotion

Admins available for demotion (excluding self)

Role Management

Promote user to admin: POST /a/{username}/admin/promote

Demote admin: POST /a/{username}/admin/demote

Product Management

View: GET /a/{username}/products/{product}

Create: POST /a/{username}/products

Edit: GET /a/{username}/products/{product}/edit

Update: PUT /a/{username}/products/{product}

Delete: DELETE /a/{username}/products/{product}

Category Management

Create: POST /a/{username}/categories

Edit: GET /a/{username}/categories/{category}/edit

Update: PUT /a/{username}/categories/{category}

Delete: DELETE /a/{username}/categories/{category}

Admin Account

View: /a/{username}/account

Update: POST /a/{username}/account/update

Delete: POST /a/{username}/account/delete

Database Design
Tables

users

id, name, email, password, role, profpic, timestamps

categories

id, name, timestamps

products

id, name, price, image, description, quantity, category_id, timestamps

carts

id, user_id, timestamps

cart_items

id, cart_id, product_id, quantity, timestamps

Relationships

User → hasOne Cart

Cart → hasMany CartItem

CartItem → belongsTo Product

Product → belongsTo Category

Getting Started
1. Clone the Repository
git clone https://github.com/JCKYHRTNT/WebProg.git
cd WebProg/TheBoysMarketplace

2. Install PHP Dependencies
composer install

3. Environment Setup

Create .env:

APP_NAME="The Boys Marketplace"
APP_ENV=local
APP_KEY=base64:GENERATE_THIS
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=theboys_marketplace
DB_USERNAME=your_username
DB_PASSWORD=your_password


Generate key:

php artisan key:generate


Create the database in MySQL manually.

4. Run Migrations and Seeders
php artisan migrate --seed

5. Start the Laravel Application
php artisan serve


Visit:

http://127.0.0.1:8000

Usage
Admin Login

Email: jackyh@gmail.com

Password: jackyh

Admin pages:

/a/{slug}

/a/{slug}/admin

User Login

john12@gmail.com / john

bobbyhuntrix@gmail.com / bobby

User pages:

/u/{slug}

/u/{slug}/cart

/u/{slug}/account

Slug = Str::slug(name).

Course Notes

This project demonstrates:

Laravel MVC

Middleware for authentication and authorization

Eloquent ORM relationships

Migrations and seeders

Blade templates

Form validation

Role-based permissions

Cart system with stock handling