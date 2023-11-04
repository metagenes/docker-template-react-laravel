# Use an official PHP runtime as the base image with PHP 8.2
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip

# Enable required Apache modules
RUN a2enmod rewrite

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Set working directory
WORKDIR /var/www/html

# Copy the Laravel application code to the container
COPY . .

# Set the ServerName globally
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose the application port
EXPOSE 8002

# Start the Apache web server
CMD ["apache2-foreground"]
