# ToDoList

Projet 8 of the "parcours développeur d'application PHP/Symfony" by Openclassrooms.

Améliorez un projet existant - https://openclassrooms.com/projects/ameliorer-un-projet-existant-1

[![Maintainability](https://api.codeclimate.com/v1/badges/31eae798840bd66a20b4/maintainability)](https://codeclimate.com/github/HaiseB/P8_TodoList/maintainability)

## Table of Contents
1. [Pre required](#Pre-required)
2. [Installation](#Installation)
3. [Settings](#Settings)
4. [How to use](#How-to-use)
5. [Build with](#Build-with)
6. [Author](#Author)
7. [For Developper](#For-Developper)

## Pre required
You will need to install those on your server
- *PHP* (>= 7.4)
- *Apache* (>= 2.4)
- *MySQL* (>= 5.7)
- *Composer* (>= 2.0)

## Installation

> Make sure the `public` repository, is at the root of your server, you can also create a virtual host that redirect the visitors to the `public` directory.

_Run thoses commands_

- ``git clone https://github.com/HaiseB/P8_TodoList.git``
- ``composer update``

Create database
- ``php bin/console doctrine:database:create``
- ``php bin/console doctrine:migrations:migrate``
Load fixtures
- ``php bin/console hautelook:fixtures:load``

## Settings

## How to use

Launch the server
> symfony serve -d

## Build with
- [Symfony 4](https://symfony.com/) - PHP framework

### Author
* **Benjamin Haise** _alias_ [@HaiseB](https://github.com/HaiseB)

### For Developper
Several commande that can help you :)

stop the symfony server
> symfony serve:stop

Launch blakfire
> blackfire agent:start

Create test database
> php bin/console doctrine:database:create --env TEST

Migrate migrations to test 
> php bin/console doctrine:migrations:migrate --env TEST

launch phpunit tests + export code coverage
> .\vendor\bin\phpunit --coverage-html tests/Coverage


