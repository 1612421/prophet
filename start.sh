cd src
composer install
cd ..
cp .env.example cp.env
php artisan key:generate
docker-compose build
docker-compose up

