# Use the php:8.1-fpm image as the base image
FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www/html/

# Install dependencies for the operating system software
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    zip \
    vim 

# Install extensions for php
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install gd

# Install composer (php package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy your application code into the container
COPY . .

# Copy your start-container script
COPY docker/php/start-container /usr/local/bin/start-container
RUN chmod +x /usr/local/bin/start-container

# Expose the port if needed
EXPOSE 8080

# Define the entry point for the container
ENTRYPOINT ["start-container"]
