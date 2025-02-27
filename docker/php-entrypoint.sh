#!/bin/sh

set -e

echo "📦 Installation des dépendances PHP..."
apt-get update && apt-get install -y librabbitmq-dev libssl-dev libpq-dev git unzip

echo "🔌 Installation et activation de l'extension AMQP..."
pecl install amqp
docker-php-ext-enable amqp

echo "🔗 Installation des extensions PHP..."
docker-php-ext-install pdo pdo_pgsql

echo "🎼 Installation de Composer..."
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

echo "🚀 Démarrage de PHP-FPM..."
exec php-fpm
