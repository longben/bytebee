<div class="codes index">
	<h2><?php __('Codes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('category');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('editable');?></th>
			<th><?php echo $this->Paginator->sort('flag');?></th>
			<th><?php echo $this->Paginator->sort('locale');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($codes as $code):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $code['Code']['id']; ?>&nbsp;</td>
		<td><?php echo $code['Code']['name']; ?>&nbsp;</td>
		<td><?php echo $code['Code']['category']; ?>&nbsp;</td>
		<td><?php echo $code['Code']['description']; ?>&nbsp;</td>
		<td><?php echo $code['Code']['editable']; ?>&nbsp;</td>
		<td><?php echo $code['Code']['flag']; ?>&nbsp;</td>
		<td><?php echo $code['Code']['locale']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $code['Code']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $code['Code']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $code['Code']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $code['Code']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
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
		<li><?php echo $this->Html->link(__('New Code', true), array('action' => 'add')); ?></li>
	</ul>
</div>