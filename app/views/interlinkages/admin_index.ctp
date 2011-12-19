<div class="interlinkages index">
	<h2><?php __('Interlinkages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('type_id');?></th>
			<th><?php echo $this->Paginator->sort('file_path');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('tag');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('start_time');?></th>
			<th><?php echo $this->Paginator->sort('end_time');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($interlinkages as $interlinkage):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $interlinkage['Interlinkage']['id']; ?>&nbsp;</td>
		<td><?php echo $interlinkage['Interlinkage']['name']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($interlinkage['Type']['name'], array('controller' => 'codes', 'action' => 'view', $interlinkage['Type']['id'])); ?>
		</td>
		<td><?php echo $interlinkage['Interlinkage']['file_path']; ?>&nbsp;</td>
		<td><?php echo $interlinkage['Interlinkage']['url']; ?>&nbsp;</td>
		<td><?php echo $interlinkage['Interlinkage']['tag']; ?>&nbsp;</td>
		<td><?php echo $interlinkage['Interlinkage']['description']; ?>&nbsp;</td>
		<td><?php echo $interlinkage['Interlinkage']['start_time']; ?>&nbsp;</td>
		<td><?php echo $interlinkage['Interlinkage']['end_time']; ?>&nbsp;</td>
		<td><?php echo $interlinkage['Interlinkage']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $interlinkage['Interlinkage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $interlinkage['Interlinkage']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $interlinkage['Interlinkage']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $interlinkage['Interlinkage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Interlinkage', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Codes', true), array('controller' => 'codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'codes', 'action' => 'add')); ?> </li>
	</ul>
</div>