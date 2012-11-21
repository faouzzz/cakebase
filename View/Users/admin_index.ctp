<?php $this->start('hook_current_actions'); ?>
    <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
<?php $this->end(); ?>
<?php $this->start('hook_related_actions'); ?>
	<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
<?php $this->end(); ?>

<h2 class="content-header"><?php echo __('Users'); ?></h2>
<?php echo $this->Session->flash(); ?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id');?></th>
            <th><?php echo $this->Paginator->sort('first_name');?></th>
            <th><?php echo $this->Paginator->sort('last_name');?></th>
            <th><?php echo $this->Paginator->sort('email');?></th>
            <th><?php echo $this->Paginator->sort('group_id');?></th>
            <th><?php echo $this->Paginator->sort('created');?></th>
            <th><?php echo $this->Paginator->sort('updated');?></th>
            <th class="actions"><?php echo __('Actions');?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>&nbsp;</td>
			<td><?php echo $this->Time->niceShort($user['User']['created']); ?>&nbsp;</td>
			<td><?php echo $this->Time->niceShort($user['User']['updated']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('<i class="icon-share"></i> View'), array('action' => 'view', $user['User']['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<i class="icon-edit"></i> Edit'), array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
				<?php echo $this->Html->confirm(__('<i class="icon-remove-circle"></i> Delete'), array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete User #%s?', $user['User']['id']), __('Delete User?')); ?>
			</td>
		</tr>
		<?php endforeach; ?>
    </tbody>
</table>
<div class="pagination pagination-centered">
    <ul>
		<?php
		echo $this->Paginator->prev('«', array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled'));
		echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));
		echo $this->Paginator->next('»', array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled'));
		?>
    </ul>
</div>
<p class="pagination-summary">
    <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} of {:count} total'))); ?>
</p>