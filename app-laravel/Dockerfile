# Use the official image as a parent image.
FROM php:8.2-apache

# Install the PHP extensions that Laravel requires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory.
WORKDIR /var/www/html

# Copy the Laravel application into the container
COPY . .

# Copy the Apache configuration file
COPY .docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Change the ownership of the application files
RUN chown -R www-data:www-data /var/www/html

RUN composer install

# Create .env file and copy .env.example to .env
RUN cp .env.example .env

# Generate Laravel application key
RUN php artisan key:generate

# Inform Docker that the container is listening on the specified port at runtime.
EXPOSE 8002