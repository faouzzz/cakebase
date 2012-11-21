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
	
3. Open `webroot/index.php` and set `CAKE_CORE_INCLUDE_PATH` to the path of your CakePHP installation

4. Rename or duplicate all the files in `Config/`.

5. Inside `Config/core.php` you will need to replace the security salt and cipher seed with your own values, this page is useful for this: http://www.sethcardoza.com/tools/random_password_generator.

6. Edit the database configuration in `Config/database.php` to match your connection details.

7. At this point you should only be receiving missing table errors, to fix this open up console and run `cake schema create --name Cakebase` from your app directory, this will set up the required tables

8. Once the login page is loading you need to add some groups and users to your tables so you can login. Open `Controller/AppController` and uncomment the following line `//$this->Auth->allow(array('*'));` This will temporarily disable Authentication on your appplication allowing you access without logging in.

9. To add some users you need to go to soemthing like `http://localhost/your-app-name/admin/users/`. Here you will be able to add some groups and users. At first you __need__ to add at least one group and one user. After adding these remember to re-enable Auth by commenting out/removing `$this->Auth->allow(array('*'));` in `Controller/AppController`

10. After enabling Auth you should be able to login with the details of the User you created and your ready to start development. If you are having trouble logging in at this point see the section below on Setting Up Permissions

Setting Up Permissions
----------------------

For the quickest set-up the app uses Cake's PHP based ACL set up. There is very little documentation on this in the cookbook but there is plenty in the `Config/acl.php`.

By default the app expects that the first group created is the 'Admin' group and has access to every feature on the site. If this is not how you have set up your groups then you will need to edit the `Config/acl.php` to see how to set your permissions. You can add other user levels as needed
