# docker-compose/manifests/dev.Dockerfile
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libonig-dev libxml2-dev libzip-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libpq-dev libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip gd

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Install Node & npm (for Tailwind / Livewire)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Set working directory
WORKDIR /app

# Copy and install Laravel dependencies if present
COPY ./composer.* /app/
RUN [ -f composer.json ] && composer install || echo "No composer.json found"

# Install NPM packages if present
COPY ./package.json /app/
RUN [ -f package.json ] && (npm install && npm run build) || echo "No package.json"

CMD php artisan migrate && php artisan serve --host=0.0.0.0 --port=8000