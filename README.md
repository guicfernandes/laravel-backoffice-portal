# laravel-backoffice-portal
That's a personnal project from a BackOffice Portal for studying and working with Laravel and VueJS.

Here are some hints for you to run the application, including how to set a environment to run PHP applications, using Laravel, VueJS and MySql.

#Windows users:

Download wamp: http://www.wampserver.com/en/
Update windows environment variable path to point to your php install folder, which is inside wamp installation directory (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)

#Mac Os, Ubuntu and windows users continue here:

- Create a database locally named homestead utf8_general_ci
- Download composer https://getcomposer.org/download/
- Pull Laravel/php project from git provider.
- Rename .env.example file to .envinside your project root and fill the database information. (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )
- Open the console and cd your project root directory
- Run composer install or php composer.phar install
- Run php artisan key:generate
- Run php artisan migrate
- Run php artisan db:seed to run seeders, if any.
- Run php artisan serve
#####You can now access your project at localhost:8000 :)

#If for some reason your project stop working do these:
composer install
php artisan migrate
