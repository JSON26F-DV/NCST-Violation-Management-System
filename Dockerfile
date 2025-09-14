FROM php:8.1-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy your application files first
COPY . /var/www/html/

# Create upload directories and set permissions
RUN mkdir -p /var/www/html/assets/userProfile \
    && chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \; \
    && chmod -R 777 /var/www/html/assets

# Create a script to fix permissions at runtime
RUN echo '#!/bin/bash\nchown -R www-data:www-data /var/www/html/assets\nchmod -R 777 /var/www/html/assets\nexec "$@"' > /entrypoint.sh \
    && chmod +x /entrypoint.sh

# Set working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80

# Use custom entrypoint
ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]