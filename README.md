[![Build status](https://img.shields.io/badge/build-passing-green.svg)](https://img.shields.io/badge/build-passing-green.svg) [![Version](https://img.shields.io/badge/coverage-70%-red.svg)](https://img.shields.io/badge/coverage-70%-red.svg) [![PHP Framework](https://img.shields.io/badge/PHP%20Framework-Slim%203-orange.svg)](https://img.shields.io/badge/PHP%20Framework-Slim%203-orange.svg) [![JS Framework](https://img.shields.io/badge/JS%20Framework-VueJS%20-orange.svg)](https://img.shields.io/badge/JS%20Framework-VueJS%20-orange.svg) 

# IMAC Social Network project

Project realised in IMAC Engineering School, with first and second year students. It uses VueJs, webpack and Slim 3.

## How to use it

### Clone the project

    https://github.com/Arctic76/Social-Network-IMAC.git
    
### Go to the project root

    cd Social-Network-IMAC

### Start your servers

- Open WAMP, MAMP or XAMPP
- Start Servers (Apache and MySQL)

### Add the database

- Go to your **phpMyAdmin**
- Create a new database named **imac-network** 
- Import the sql file from the project folder `/config/sql/`


### Check the SQL settings

- Go to the project folder `api/app/`
- Open the file `settings.php`
- Check if the **username** and **login** are the same of your phpMyAdmin

### Change the localhost root

- Go to the project folder `config/localhost/`
- Open the file `settings.js`
- Change the root of your localhost to the project

Exemple (if your project is at the root of your localhost) : *http://localhost:8888/Social-Network-IMAC/*


### Install all modules from package.json file

    npm install

### Host a web server and build the development environment

    npm run dev

### Open your favorite browser and tap this url

    http://localhost:8080/

    
## Prior installation

You have to download [Node](https://nodejs.org/en/download/).


# La branche des vrais

Le modèle MVC a été implémenté avec un squelette Slim 3 qui inclus Twig, Eloquent et Monolog.

