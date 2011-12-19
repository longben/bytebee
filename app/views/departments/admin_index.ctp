<div style="padding:5px;background:#fff;width:99%;">
	<?php echo $html->link(__('新增部门', true), array('action'=>'add'), array('class'=>'easyui-linkbutton', 'icon'=>'icon-add')); ?>
</div>
<div class="departments">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('telephone');?></th>
			<th><?php echo $this->Paginator->sort('linkman');?></th>
			<th><?php echo $this->Paginator->sort('flag');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($departments as $department):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $department['Department']['id']; ?>&nbsp;</td>
		<td><?php echo $department['Department']['name']; ?>&nbsp;</td>
		<td><?php echo $department['Department']['parent_id']; ?>&nbsp;</td>
		<td><?php echo $department['Department']['telephone']; ?>&nbsp;</td>
		<td><?php echo $department['Department']['linkman']; ?>&nbsp;</td>
		<td><?php echo $department['Department']['flag']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $department['Department']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $department['Department']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $department['Department']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $department['Department']['id'])); ?>
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