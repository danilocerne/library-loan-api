<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## MER - Conceptual Model

Library Book Lending Management API Conceptual Model

<p align="center"><img src="https://github.com/danilocerne/library-loan-api/blob/master/mer.png" alt="Modelo Conceitual"></p>

## Prerequisites for the API to work

You must have installed the following programs:

PHP 8.3.7
Composer 2.7.6
MySQL 8.0.37

## Running the API in a development environment

Once you have cloned the Github repository to your local machine, do:

Run the commands to create the database and populate all the Library Book Lending Management API tables:

php artisan migrate:fresh
php artisan db:seed

Other commands:
 
php artisan optimize:clear
composer dump-autoload -o

## Problem that occurred in Laravel 11 after writing all Controllers, Services, Repositories and Models classes:

I chose to use Laravel 11 and 2 days ago I encountered a problem using automatic dependency injection via TypeHinting from the Laravel framework. I followed the Laravel 11 documentation to register the RepositoryServiceProvider dependencies, but I still couldn't get it to work. I continue searching for a way to solve this problem. Without this problem resolved, the UserService that I pass in the UserController class constructor is not automatically instantiated by Laravel's IoC container and thus generates the error:

"message": "Target [App\\Http\\Repositories\\Contracts\\UserRepositoryInterface] is not instantiable while building [App\\Http\\Controllers\\UserController, App\\Http\\Services\\UserService]. ",

Below is a print of the error I found via Postman and executing the command:

php artisan route:list

As I explained above, without the automatic injection of dependencies working, my delivery was delayed. Unfortunately, in 4 days, that's what I managed to do. But I will keep trying to solve this problem! As soon as I solve this problem I will continue testing all the api.php routes, I would test the JWT authentication that I created with Sanctum, I would create the unit and integration tests and finally I would implement the triggering of emails using the queues of the Laravel.

Observation:
In the design (Conceptual Model) that I added in the Readme of this project, I added the entities UserType, Group, Permission. My idea was after implementing the authentication/authorization of routes with the Sanctum JWT token, after the user authenticated I would check if the user trying to access the create route (for example) has permission to access that route. Basically the idea was to create a personalized ACL CRUD, assigning in the registration whether or not the user has permission to access that route. This personalized registration makes it possible not only to check whether the user has access to such routes, but also to register any type of permission. For example, permission to upload an image within their profile.
