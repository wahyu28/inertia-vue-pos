# Laravel POS

Point Of Sales built with Laravel, Inertia and Vue
<!--- 
## Support me

<a href="https://trakteer.id/wahyu%20pratama4" target="_blank"><img id="wse-buttons-preview" src="https://cdn.trakteer.id/images/embed/trbtn-blue-2.png" height="40" style="border:0px;height:40px;" alt="Trakteer Saya"></a>
--->


## Requirements

-   PHP 8.1 or latest
-   Node 16+ or latest

## How to run

```bash
cp .env.example .env # configure app for laravel
configure your database
composer install
php artisan migrate --seed
npm install
npm run dev # compiling asset for development
```

## Default User

```bash
username : admin@gmail.com
password : password
```

## Compile Assets ( to prod )

```bash
npm run build
```

