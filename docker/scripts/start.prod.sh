#!/bin/sh

if [ ! -d /usr/share/nginx/html/vendor ] || [ -z "$(ls -A /usr/share/nginx/html/vendor)" ]; then
    echo "Composer install running..."
    composer install
else
    echo "Vendor already exists and not empty. Skipping step."
fi

if [ ! -f /usr/share/nginx/html/storage/logs/app.log ]; then
    echo "Creating app.log"
    echo "" >>/usr/share/nginx/html/storage/logs/app.log
    chown -R www-data:www-data /usr/share/nginx/html/storage/logs/app.log
else
    echo "app.log already exists. Skipping step"
fi

if [ -f /cronjob ]; then
    chmod 644 /cronjob && crontab /cronjob
fi

## Creating log file:

if [ ! -f /usr/share/nginx/html/storage/logs/laravel.log ]; then
    echo "Creating laravel.log"
    echo "" >>/usr/share/nginx/html/storage/logs/laravel.log
    chown -R www-data:www-data /usr/share/nginx/html/storage/logs/laravel.log
else
    echo "laravel.log already exists. Skipping step"
fi

# Running supervisor:

echo "Running supervisor"
/usr/bin/supervisord -n -c /etc/supervisord.conf

# Migrating database:

echo 'Migrating database...'
if [ -f /usr/share/nginx/html/migrate ]; then
    php /usr/share/nginx/html/artisan migrate --force
fi
