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

ENV WEBROOT=/var/www/html/public

CMD ["/start.sh"]