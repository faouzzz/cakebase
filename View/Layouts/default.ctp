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
    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a href="#" class="brand">CakeBase</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <?php 
                            echo $this->Menu->item($this->Html->link(__('Home'), '/'));
                            echo $this->Menu->item($this->Html->link(__('Users'), array('admin' => true, 'controller' => 'users', 'action' => 'index')));
                            echo $this->Menu->item($this->Html->link(__('Groups'), array('admin' => true, 'controller' => 'groups', 'action' => 'index')));
                        ?>
                    </ul>
                    <ul class="nav pull-right">
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $this->Session->read('Auth.User.first_name'); ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <?php 
                                    echo $this->Html->link('<i class="icon-user icon-large"></i> Profile', array('controller' => 'users', 'action' => 'edit', $this->Session->read('Auth.User.id')), array('escape' => false)); 
                                    ?>        
                                </li>
                                <li class="divider"></li>
                                <li><?php echo $this->Html->link('<i class="icon-signout icon-large"></i> Logout', array('admin' => true, 'controller' => 'users', 'action' => 'logout'), array('escape' => false, 'data-pjax' => 'false'));?></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div id="container" class="container-fluid">
        <?php echo $this->Session->flash(); ?>
        <div class="content">
            <div class="row-fluid">
                <div id="sidebar" class="span2">
                    <div class="well well-small">
                        <ul class="nav nav-list">
                            <?php if($this->fetch('hook_current_actions')): ?>
                                <li class="nav-header current-actions"><?php echo __('Current Actions'); ?></li>
                                <?php echo $this->fetch('hook_current_actions'); ?>
                            <?php endif; ?>
                            <?php if($this->fetch('hook_related_actions')): ?>
                                <li class="nav-header related-actions"><?php echo __('Related Actions'); ?></li>
                                <?php echo $this->fetch('hook_related_actions'); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div id="main" class="span10 posts index">
                    <div class="loader"></div>
                    <?php echo $content_for_layout; ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->element('sql-dump'); ?>
</body>
<script id="tmpl-modal-confirm" type="text/html">
    <div class="modal confirm fade">
        <form action="${action}" method="post">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3>${title}</h3>
            </div>
            <div class="modal-body">
                <p>${content}</p>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn" data-dismiss="modal" value="<?php echo __('Cancel'); ?>"/>
                <input type="submit" class="btn btn-danger continue" value="<?php echo __('Continue'); ?>"/>
            </div>
        </form>
    </div>
</script>
</html>