<?php $this->start('hook_current_actions'); ?>
    <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?></li>
    <li><?php echo $this->Html->confirm(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete User #%s?', $user['User']['id']), __('Delete User?')); ?></li></li>
<?php $this->end(); ?>
<?php $this->start('hook_related_actions'); ?>
    <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
	<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?></li>
<?php $this->end(); ?>

<h2 class="content-header"><?php  echo __('User');?></h2>
<?php echo $this->Session->flash(); ?>

<dl class="dl-horizontal">
	<dt><?php echo __('Id'); ?></dt>
	<dd><?php echo h($user['User']['id']); ?>&nbsp;</dd>
	<dt><?php echo __('First Name'); ?></dt>
	<dd><?php echo h($user['User']['first_name']); ?>&nbsp;</dd>
	<dt><?php echo __('Last Name'); ?></dt>
	<dd><?php echo h($user['User']['last_name']); ?>&nbsp;</dd>
	<dt><?php echo __('Email'); ?></dt>
	<dd><?php echo h($user['User']['email']); ?>&nbsp;</dd>
	<dt><?php echo __('Password'); ?></dt>
	<dd><?php echo h($user['User']['password']); ?>&nbsp;</dd>
	<dt><?php echo __('Group'); ?></dt>
	<dd><?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>&nbsp;</dd>
	<dt><?php echo __('Created'); ?></dt>
	<dd><?php echo $this->Time->niceShort($user['User']['created']); ?>&nbsp;</dd>
	<dt><?php echo __('Updated'); ?></dt>
	<dd><?php echo $this->Time->niceShort($user['User']['updated']); ?>&nbsp;</dd>
</dl>
