<?php $this->start('hook_current_actions'); ?>
    <li><?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id'])); ?></li>
    <li><?php echo $this->Html->confirm(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), array(), __('Are you sure you want to delete Group #%s?', $group['Group']['id']), __('Delete Group?')); ?></li></li>
<?php $this->end(); ?>
<?php $this->start('hook_related_actions'); ?>
    <li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?></li>
	<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?></li>
<?php $this->end(); ?>

<h2 class="content-header"><?php  echo __('Group');?></h2>
<?php echo $this->Session->flash(); ?>

<dl class="dl-horizontal">
	<dt><?php echo __('Id'); ?></dt>
	<dd><?php echo h($group['Group']['id']); ?>&nbsp;</dd>
	<dt><?php echo __('Name'); ?></dt>
	<dd><?php echo h($group['Group']['name']); ?>&nbsp;</dd>
	<dt><?php echo __('Created'); ?></dt>
	<dd><?php echo $this->Time->niceShort($group['Group']['created']); ?>&nbsp;</dd>
	<dt><?php echo __('Updated'); ?></dt>
	<dd><?php echo $this->Time->niceShort($group['Group']['updated']); ?>&nbsp;</dd>
</dl>
<div class="related">
    <h3><?php echo __('Users');?></h3>
    <?php if (!empty($group['User'])):?>
    <table class="table table-striped ">
        <thead>
            <tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('First Name'); ?></th>
				<th><?php echo __('Last Name'); ?></th>
				<th><?php echo __('Email'); ?></th>
				<th><?php echo __('Group Id'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Updated'); ?></th>
                <th class="actions"><?php echo __('Actions');?></th>
            </tr>
        </thead>
        <tbody>
			<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo $user['User']['id'];?></td>
				<td><?php echo $user['User']['first_name'];?></td>
				<td><?php echo $user['User']['last_name'];?></td>
				<td><?php echo $user['User']['email'];?></td>
				<td><?php echo $user['User']['group_id'];?></td>
				<td><?php echo $this->Time->niceShort($user['User']['created']);?></td>
				<td><?php echo $this->Time->niceShort($user['User']['updated']);?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('<i class="icon-share"></i>View'), array('controller' => 'users', 'action' => 'view', $user['User']['id']), array('escape' => false)); ?>
					<?php echo $this->Html->link(__('<i class="icon-edit"></i>Edit'), array('controller' => 'users', 'action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
					<?php echo $this->Html->confirm(__('<i class="icon-remove-circle"></i>Delete'), array('controller' => 'users', 'action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete Group #%s?', $user['User']['id']), __('Delete Group?')); ?>
				</td>
			</tr>
			<?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
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
</div>
