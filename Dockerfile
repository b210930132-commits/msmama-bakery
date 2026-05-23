FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN cp .env.example .env

RUN php artisan key:generate

RUN mkdir -p database
RUN touch database/database.sqlite

RUN php artisan migrate --force

RUN php artisan storage:link || true

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}