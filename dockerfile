FROM php:8.2-cli

# Install system dependencies

RUN apt-get update && apt-get install -y 
git 
unzip 
zip 
libzip-dev 
libpng-dev 
libonig-dev 
libxml2-dev 
curl

# Install PHP extensions

RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# Install Composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory

WORKDIR /app

# Copy project files

COPY . .

# Install Laravel dependencies

RUN composer install --no-dev --optimize-autoloader

# Generate caches

RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan view:clear
RUN php artisan route:clear

# Expose Render port

EXPOSE 10000

# Start Laravel

CMD php artisan serve --host=0.0.0.0 --port=$PORT
