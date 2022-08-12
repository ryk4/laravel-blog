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

php artisan queue:work --queue=Emails,default --sleep=3 --tries=3 --max-time=3600 --timeout=1800
```

Tasks:

- ~~deploy to heroku~~
- ~~SSL heroku~~
- ~~queue worker heroku~~
- ~~add more properties to queue workers~~
- ~~attach proper domain name~~
- SSL on godaddy (temporary using redirect instead of masking)
- ~~clean up github description~~
- ~~add github url to project~~
- ~~change mail:to..->onQueue('emails') to be using jobs and perform all the operations inside the job.~~
- ~~Service pattern for all logic~~
- ~~Read on repository patterns and figure out the best approach for this project.~~
- ~~Repository pattern for db all interactions~~
- ~~gmail SMTP credentials~~
- ~~Are PhpDoc comments required for controllers? psr?~~
- Read and understand how SSL certificates work and how to install them
- Install certificate for https://www.local-developer.com
- Add full test coverage for Blogs (guests and admins)
