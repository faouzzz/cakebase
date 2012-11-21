<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css(array(
        'bootstrap.min',
        'bootstrap-responsive.min',
        'font-awesome',
        'style',
    ));

    echo '<!--[if lt IE 9]>';
    echo $this->Html->script("http://html5shim.googlecode.com/svn/trunk/html5.js");
    echo '<!--<![endif]-->';

    echo $this->Html->script(array(
        '//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
        'bootstrap.min',
        'plugins',
        'main',
    ));
    echo $scripts_for_layout;

    echo $this->Js->writeBuffer();
    ?>
</head>
<body>    
    <div class="container">
        <?php echo $this->Session->flash(); ?>                
        <?php echo $content_for_layout; ?>
    </div>
</body>
</html>