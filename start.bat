@echo off
echo Pokretanje Laravel projekta...

composer install

if not exist .env (
    copy .env.example .env
)

php artisan key:generate

php artisan migrate:fresh --seed

php artisan serve

pause