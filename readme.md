Don't forget to launch the following command after the clone

//// Installation
$composer install

touch database/database.sqlite

php artisan migrate

Copy the .env.example in you .env file

This project requiere the following packages :
sudo apt-get install phpunit
sudo apt-get install sqlite3

//// Insert Data

// parse the csv file
php artisan importData:run cdrs.csv

// Seeding
php artisan db:seed
