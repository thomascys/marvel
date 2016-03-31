# Symfony 3 demo application

A Symfony 3 demo application created to get familiar with the Symfony framework. It uses:

- Doctrine ORM Mapping
- Entities
- Data fixtures
- Authentication

## Requirements

- PHP 5.5.9 or higher.
- PDO MySQL.

## Getting started

Clone this project.

```bash
git clone https://github.com/thomascys/marvel.git
cd marvel
```

Run composer. When the installer asks you to choose a database name please type **marvel**

```bash
composer install
```

Run the following commands to create the database, tables and populate them with data fixtures.

```bash
php bin/console doctrine:database:create

php bin/console doctrine:schema:create

php bin/console doctrine:fixtures:load

php bin/console server:run
```

Login credentials.

- Username: admin
- Password: admin