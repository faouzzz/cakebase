<?php $this->assign('title', __('Groups', true)); ?>

<?php $this->start('hook_current_actions'); ?>
    <li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?></li>            
<?php $this->end(); ?>

<?php $this->start('hook_related_actions'); ?>
	<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
<?php $this->end(); ?>

<h2 class="content-header"><?php echo __('Groups'); ?></h2>
<?php echo $this->Session->flash(); ?>

<table class="table table-striped ">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id');?></th>
            <th><?php echo $this->Paginator->sort('name');?></th>
            <th><?php echo $this->Paginator->sort('created');?></th>
            <th><?php echo $this->Paginator->sort('updated');?></th>
            <th class="actions"><?php echo __('Actions');?></th>
        </tr>
    </thead>
    <tbody> 
        <?php foreach ($groups as $group): ?>
		<tr>
			<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
			<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
			<td><?php echo $this->Time->niceShort($group['Group']['created']); ?>&nbsp;</td>
			<td><?php echo $this->Time->niceShort($group['Group']['updated']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('<i class="icon-share"></i> View'), array('action' => 'view', $group['Group']['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<i class="icon-edit"></i> Edit'), array('action' => 'edit', $group['Group']['id']), array('escape' => false)); ?>
				<?php echo $this->Html->confirm(__('<i class="icon-remove-circle"></i> Delete'), array('action' => 'delete', $group['Group']['id']), array('escape' => false), __('Are you sure you want to delete Group #%s?', $group['Group']['id']), __('Delete Group?')); ?>
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