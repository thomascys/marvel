# Symfony 3 demo application

A Symfony 3 demo application created to get familiar with the Symfony framework.
It uses Doctrine ORM, entities, data fixtures and authentication.

## Requirements

- PHP 5.5.9 or higher.
- PDO MySQL.

## Getting started

Clone this project.

```bash
git clone https://github.com/thomascys/marvel.git
```

Run composer.

```bash
composer install
```

To get this project fully up and running just run the following commands to create the database, tables and populate them with data fixtures.

```bash
php bin/console doctrine:database:create

php bin/console doctrine:schema:create

php bin/console doctrine:fixtures:load

php bin/console server:run
```

Login credentials.

Username: admin
Password: admin