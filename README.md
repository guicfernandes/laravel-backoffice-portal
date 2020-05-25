# Backoffice Portal

That's a personnal project from a BackOffice Portal for studying and working with Laravel and VueJS.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

#### Windows users:
```
Download wamp: http://www.wampserver.com/en/.
Update windows environment variable path to point to your php install folder, which is inside wamp installation directory (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash).
```

### Installing

A step by step series of examples that tell you how to get a development env running

- Download composer https://getcomposer.org/download/

- Clone/Pull the project from git.

```
git clone {project_url}
```

- Open the console and go to your project root directory

```bash
cd {project_root_directory}
```

- Install Composer

```bash
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

- Get front-end dependencies

```bash
npm install
npm run dev
```

- Create a database locally named 'db'

```bash
mysql -u root -p
mysql> create database db;
```

- Create a tables needed by the application in the local database

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

Now you are able to run the application 

## Running the application
To run the application you should get to the command

```bash
php artisan serve
```

And now get to url's browser "http://localhost:8000"

Once there, you can register yourself or, if so, log yourself in.

## Running the unit tests

To run the full suite of unit tests you should run the command
```bash
vendor/bin/phpunit
```

### Break down into end to end tests

And you can also run the only one test you want to by running the command

```bash
vendor/bin/phpunit --filter {unit_test_name}
```

## Built With

* [Laravel](https://laravel.com/docs/7.x) - The web framework used
* [VueJS](https://vuejs.org/v2/guide/) - Front-end
* [MySQL](https://dev.mysql.com/doc/) - Database Management
* [Laravel Authentication](https://laravel.com/docs/7.x/authentication) - Authentication Mecanism
* [Laravel Model Factory](https://laravel.com/docs/7.x/database-testing) - Model Factory for Database Testing
* [MVC](https://pt.wikipedia.org/wiki/MVC) - MVC architectural pattern

## Authors

* **Guilherme Cardoso Fernandes** - *Initial work* - (https://github.com/guicfernandes)
