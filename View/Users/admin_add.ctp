<?php $this->start('hook_current_actions'); ?>
	<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
<?php $this->end(); ?>

<?php $this->start('hook_related_actions'); ?>
	<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
<?php $this->end(); ?>

<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
		<?php echo $this->Session->flash(); ?>
		<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('confirm_password', array('type' => 'password'));
		echo $this->Form->input('group_id');
		?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button(sprintf('<i class="icon-white icon-ok-sign"></i> %s', __('Save User')), array('type' => 'submit', 'escape' => false, 'class' => 'btn btn-info')); ?>
	</div>
<?php echo $this->Form->end(); ?>