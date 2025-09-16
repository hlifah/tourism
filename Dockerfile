# Dockerfile for Laravel app

FROM php:8.1-apache

WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo_mysql zip

# Enable apache mod_rewrite
RUN a2enmod rewrite

# Copy project files to container
COPY . /var/www/html

# Set proper permissions for Laravel folders
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Run composer install (production optimized)
RUN composer install --no-dev --optimize-autoloader

# Expose port 80
EXPOSE 80

CMD ["apache2-foreground"]
