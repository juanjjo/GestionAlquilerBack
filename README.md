## generar tu archivo .env
cp .env.example .env

## generar clave 
php artisan key:generate

## luego de instalar las librerias
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

## generar jwt secret
php artisan jwt:secret