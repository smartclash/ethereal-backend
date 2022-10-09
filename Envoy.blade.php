@servers(['web' => 'root@194.195.117.228'])

@task('update', ['on' => 'web'])
    cd /var/www/ethereal
    git pull origin main
    composer install -o --no-dev
    php artisan migrate --force
    php artisan view:cache
    php artisan config:cache
    php artisan route:cache
    php artisan event:cache
@endtask
