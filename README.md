CakeBase
========

A quick start project for getting an Auth enabled application up and running

Features
--------

Todo...

Installation
------------

__This is a work in progress....__

__Note:__ Most of the configuration files have been removed from the repository and replaced with *.default versions of themselves, these are here to ensure any updates to your config files aren't updated when you pull new changes from the repo. 

__* If you are not forking the project and are duplicating or using this as a new project you don't need to copy the files you can just rename them.__

1. The first thing to do is clone the repository to your development machine. `git clone https://github.com/veganista/cakebase`.

2. Rename or duplicate `webroot/index.default.php` to `webroot/index.php`.

3. Rename or duplicate all the files in `Config/`.

4. Inside `Config/core.php` you will need to replace the security salt and cipher seed with your own values, this page is useful for this: http://www.sethcardoza.com/tools/random_password_generator.

5. Edit the database configuration in `Config/database.php` to match your connection details.

6. At this point you should only be receiving missing table errors, to fix this open up console and run `cake schema create` from your app directory, this will set up the required tables

7. The next thing to do is add some user's so you can login by disabling auth, remember to renable auth or you will have no authorization on your application

