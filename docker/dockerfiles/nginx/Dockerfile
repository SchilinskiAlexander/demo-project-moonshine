FROM nginx:1.25.4-alpine AS dev

COPY . /var/www/app
COPY ./docker/dockerfiles/nginx/config/nginx-php.conf /etc/nginx/nginx.conf

EXPOSE 80