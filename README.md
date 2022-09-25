# Blog/Article management system

<p align="center">
  <img src="https://ryk4.github.io/ryk4/assets/images/portfolio/local-developer.png" width="350" title="hover text">
</p>

I built this project for my own personal use to manage articles/blogs on programming topics. The goal was to make it as
simple as possible and have only the necessary features. There is image uploading, WYSIWYG editor for writing/editing
blogs, background jobs and so on.

**Feel free to re-use this project to create your own personal blog site. If you have trouble adjusting the project to
meet your needs, you can always <a href="mailto:rytiskli@gmail.com">email me</a> :)**

### Features

- Authentication
- Custom fully responsive Bootstrap 5 styling
- WYSIWUG editor for managing blogs
- Queues/Background jobs for more intense tasks. Queue monitor too
- CRUD forms for most of the functionality
- Vue 3 for some UI functionality to improve UI experience

### Technologies used

- Laravel 9
- PHP 8.1
- Vue JS
- Imgur for image upload

### Install and run on local .

```sh
git clone {projectURL}
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Run the following worker to execute background jobs.

```sh
php artisan queue:work --queue=Emails,default --sleep=3 --tries=3 --max-time=3600 --timeout=1800
```

