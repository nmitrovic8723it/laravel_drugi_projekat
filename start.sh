#!/bin/bash
echo "Pokrećem Laravel projekat..."

composer install

if [ ! -f .env ]; then
  cp .env.example .env
fi

php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
