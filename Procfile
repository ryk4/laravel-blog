web: vendor/bin/heroku-php-apache2 public/

[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php artisan queue:work --queue=emails,default --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=forge
numprocs=8
redirect_stderr=true
stdout_logfile=/home/forge/app.com/worker.log
stopwaitsecs=3600
