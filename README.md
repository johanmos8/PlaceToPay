# Project to order and pay products

Development in php with laravel 8, which involves making an invoice payment through the redirection service with PlacetoPay [webcheckout](https://placetopay.github.io/web-checkout-api-docs/#webcheckout) , controlling the invoice payment statuses and show to users theirs orders and the status for each of them.
In this project was used Tailwind.css as framework to render a better designed in each view

## Installation

You must keep in mind that since this program is built with php, you must have a **WEB SERVER** configured at your pc.
Its neccesary to have extension soap configured in your php.ini because it's required to enable communication with PlaceToPay

### Clone the repository using the next command

    git clone https://github.com/johanmos8/PlaceToPay.git -b master 

### Installing dependencies with Composer 
Install the dependencies with composer. you must have [Composer](https://getcomposer.org/) installed on your machine.

The composer dependences download can be done using this command in the console, inside the root folder of your project:

```bash
$ composer install
```

This will install all the necessary dependencies for the project defined in the <composer.json file during development.

### Environment file

Due to git excludes .env  file for security reasons there is a example file to get all the configurations for this project. Use the next command to config the file versioned as your environment file

```bash
$ cp .env.example .env
```
In this file exists the configuration file for our project. Also if you need you can fill the data for the redirection with [PlacetoPay](https://placetopay.github.io/web-checkout-api-docs/#que-datos-debo-tener-antes-de-iniciar-la-instalacion) and the db information that you are going to use.
### Database connection

Please open .env file and write your credentials for your database connection
For example: 

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=store
DB_USERNAME=root
DB_PASSWORD=

if you use a database engine different to myqsl, please sure to change

  'default' => env('DB_CONNECTION', 'mysql')
 in the file config/database.php

### Database migrations

you have to run the migrations and seeders for this project using the next command:

```bash
$ php artisan migrate --seed
```
Note: there are seeders for products and users
### Running

Run your web server and open the url in your favorite browser
## Usage

For use this application we need to have an user created, there is a user for default in the database that can be used:

<b>email</b>: test@evertec.com
<b>password:</b> 12345678

if you want you can create a new one, please enter to [YourUrl]/register

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

