<?php 

/**
 * @todo make sure that the plugin name is removed when accessing the users controller
 *       urls we want are /users/add and users/groups/add
 *       Looks like this is done with no routes... 
 */
Router::connect('/admin/users', array('plugin' => 'users', 'admin' => true));

//Router::connect('/admin/users/:action/*', array('admin' => true, 'plugin' => 'users'));
//Router::connect('/admin/users/*', array('admin' => true, 'plugin' => 'users'));

?>