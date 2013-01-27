<?php $this->assign('title', __('Login', true)); ?>

<?php 
echo $this->Form->create('User');
?>    
<div style="position: relative; top: auto; left: auto; margin: 0 auto; z-index: 1" class="modal">
    <div class="modal-header">        
        <h3><i class="icon-lock"></i> Login</h3>
    </div>
    <div class="modal-body">
        <?php //echo $this->Session->flash('auth'); ?>
        <?php echo $this->Session->flash(); ?>
        <?php
        echo $this->Form->inputs(array(
            'legend' => false,
            'email',
            'password'
        ));
        ?>
    </div>
    <div class="modal-footer">
        <?php echo $this->Form->submit('Login', array('class' => 'btn btn-info')); ?>
    </div>
</div>
<?php echo $this->Form->end(); ?>
