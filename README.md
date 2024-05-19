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
