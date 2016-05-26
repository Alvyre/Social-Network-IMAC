[![Build status](https://img.shields.io/badge/build-passing-green.svg)](https://img.shields.io/badge/build-passing-green.svg) [![Version](https://img.shields.io/badge/coverage-10%-red.svg)](https://img.shields.io/badge/coverage-10%-red.svg) 

# IMAC Social Network project

Project realised in IMAC Engineering School, with first and second year students. It uses VueJs, webpack and Slim 3.

## How to use it

### Clone the project

    https://github.com/Arctic76/Social-Network-IMAC.git
    
### Go to the project root

    cd Social-Network-IMAC
    
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

## Pour simplifier le lancement de l'API:

Changer `index.php` contenu dans `htdocs/` ici : `header('Location: '.$uri.'/dashboard/');` par `header('Location: '.$uri.'/Social-Network-IMAC/src/public/api/public/');`

En vrai faut pas le faire comme ça mais ça fait gagner du temps.

### D'autres informations prochainement.
