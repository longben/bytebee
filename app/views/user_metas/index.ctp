<div class="userMetas index">
	<h2><?php __('User Metas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('role_id');?></th>
			<th><?php echo $this->Paginator->sort('last_ip');?></th>
			<th><?php echo $this->Paginator->sort('login_count');?></th>
			<th><?php echo $this->Paginator->sort('cookie_token');?></th>
			<th><?php echo $this->Paginator->sort('flag');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($userMetas as $userMeta):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $userMeta['UserMeta']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userMeta['Role']['name'], array('controller' => 'roles', 'action' => 'view', $userMeta['Role']['id'])); ?>
		</td>
		<td><?php echo $userMeta['UserMeta']['last_ip']; ?>&nbsp;</td>
		<td><?php echo $userMeta['UserMeta']['login_count']; ?>&nbsp;</td>
		<td><?php echo $userMeta['UserMeta']['cookie_token']; ?>&nbsp;</td>
		<td><?php echo $userMeta['UserMeta']['flag']; ?>&nbsp;</td>
		<td><?php echo $userMeta['UserMeta']['created']; ?>&nbsp;</td>
		<td><?php echo $userMeta['UserMeta']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $userMeta['UserMeta']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $userMeta['UserMeta']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $userMeta['UserMeta']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userMeta['UserMeta']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User Meta', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Roles', true), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role', true), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>