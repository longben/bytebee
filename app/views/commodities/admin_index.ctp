<div class="commodities index">
	<h2><?php __('Commodities');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('alias');?></th>
			<th><?php echo $this->Paginator->sort('type_id');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('point');?></th>
			<th><?php echo $this->Paginator->sort('is_new');?></th>
			<th><?php echo $this->Paginator->sort('is_recommend');?></th>
			<th><?php echo $this->Paginator->sort('picture');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('valid_from');?></th>
			<th><?php echo $this->Paginator->sort('valid_thru');?></th>
			<th><?php echo $this->Paginator->sort('flag');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($commodities as $commodity):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $commodity['Commodity']['id']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['name']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['alias']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['type_id']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['price']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['point']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['is_new']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['is_recommend']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['picture']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['description']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['valid_from']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['valid_thru']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['flag']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['created']; ?>&nbsp;</td>
		<td><?php echo $commodity['Commodity']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $commodity['Commodity']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $commodity['Commodity']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $commodity['Commodity']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $commodity['Commodity']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Commodity', true), array('action' => 'add')); ?></li>
	</ul>
</div>