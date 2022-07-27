<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

### Install and run on local .

```sh
git clone {projectURL}
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate:fresh --seed
php artisan serve

php artisan queue:work --queue=Emails,default
```
