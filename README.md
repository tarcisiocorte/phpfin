# phpfin
basic project

An easy way to install PHP 7.0 on Ubuntu
~# sudo apt-get install php7.0 libapache2-mod-php7.0 php7.0-cli php7.0-common php7.0-mbstring php7.0-gd php7.0-intl php7.0-xml php7.0-mysql php7.0-mcrypt php7.0-zip



1. Start project
  ~# composer init

2. Set up the composer.json
  ~# composer dumpautoload

  Use Phinx
  https://phinx.org/

3. Create a Phinx migration
  ~# vendor/bin/phinx create CategoryCosts

4. Create a migration (execute the Up method)
  ~# vendor/bin/phinx migrate
  or
  ~# vendor/bin/phinx migrate -e production

  we can use rollback, like:
  ~# vendor/bin/phinx rollback -t '20170812192511'

5. Seed class creating and run
  ~# vendor/bin/phinx seed:create CategoryCostsSeeder
    or  
  ~# vendor/bin/phinx seed:run

6. Use PHP Faker :https://github.com/fzaninotto/Faker
  ~# composer require fzaninotto/faker
    after run seed
  ~# vendor/bin/phinx seed:run

7. Use Pimple Container Interop
  ~# composer require container-interop/container-interop

8. Aura.Router
  ~# composer require aura/router:3.1.0

9. Using Zend Diactoros
  ~# composer require zendframework/zend-diactoros:1.3.10

10. Eloquent
  ~# composer require illuminate/database:5.4.13

mbstring extenstion should be available at your system

