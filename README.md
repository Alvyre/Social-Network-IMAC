# IMAC Social Network project

###How to use
```
vagrant up
vagrant ssh
./post-install/bootstrap.sh
```

This will initialize the virtual box.
Then, initialize the projet:

```
cd public/
npm install
cd api/
composer install
```

To build js assets:

```
npm run dev
npm run build #production build with minifying
```

###Box informations
IP
  - 192.168.33.10

SQL
  - Hostname: localhost or 127.0.0.1
  - Username: root
  - Password: root
  - Database: scotchbox

Features
  - PHP 5.6
  - Composer
  - Node
  - NPM
  - MySQL / PostreSQL / SQLite / MongoDB
  - Grunt / Bower / Gulp

For complete list: https://github.com/scotch-io/scotch-box