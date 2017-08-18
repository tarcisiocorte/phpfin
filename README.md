# phpfin
basic project

1. Start project
  ~# composer init

2. Set up the composer.json
  ~# composer dumpautoload

  Use Phinx
  https://phinx.org/

3. Create a Phinx migration
  ~# vendor/bin/phinx CreateCategoryCosts

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
