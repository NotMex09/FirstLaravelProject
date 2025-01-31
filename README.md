# FirstLaravelProject
 
## Installation

Change directory

cd projet

- Copy .env.example file

cp .env.example .env

- Install composer

composer i

- Generate key

php artisan key:generate

- Update database information in .env file

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

- Run migration

php artisan migrate

- Seed databse

php artisan db:seed


php artisan storage:link

- Start server

php artisan serve

- See the result

http://127.0.0.1:8000/


## Admin Details
- Admin credential
```
email:admin@techhorizons.com
Password:password
