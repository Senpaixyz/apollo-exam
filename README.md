## Installation

Requires [Node.js](https://nodejs.org/) to run.

Install the dependencies start the server.

```sh
cd "target directory"
git clone https://github.com/Senpaixyz/apollo-exam.git
```
Create database.sqlite under /database folder, modify .env file 
```sh
DB_CONNECTION=sqlite
DB_DATABASE=${your path}\database\database.sqlite
```
Do composer install
```sh
composer update (optional)
composer install
php artisan key:generate
```
Execute npm command
```sh
npm install
npm run watch
```
Do migration
```sh
php artisan migrate
```
Run server
```sh
php artisan serve
```

Navigate to: http://127.0.0.1:8000/
