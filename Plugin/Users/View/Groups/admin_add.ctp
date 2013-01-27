<?php $this->assign('title', __('Add Group', true)); ?>

<?php $this->start('hook_current_actions'); ?>
	<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index'));?></li>   
<?php $this->end(); ?>

<?php $this->start('hook_related_actions'); ?>
	<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
<?php $this->end(); ?>

<?php echo $this->Form->create('Group');?>
    <fieldset>
        <legend><?php echo __('Add Group'); ?></legend>
        <?php echo $this->Session->flash(); ?>
        <?php
        echo $this->Form->input('name');
        ?>    
    </fieldset>
    <div class="form-actions">
        <?php echo $this->Form->button(sprintf('<i class="icon-white icon-ok-sign"></i> %s', __('Save Group')), array('type' => 'submit', 'escape' => false, 'class' => 'btn btn-info')); ?>
    </div>
<?php echo $this->Form->end();?>
