<div class="sysLogs">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('system_name');?></th>
			<th><?php echo $this->Paginator->sort('brower_name');?></th>
			<th><?php echo $this->Paginator->sort('ip');?></th>
			<th><?php echo $this->Paginator->sort('page_name');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('module_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sysLogs as $sysLog):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $sysLog['SysLog']['id']; ?>&nbsp;</td>
		<td><?php echo $sysLog['SysLog']['user_id']; ?>&nbsp;</td>
		<td><?php echo $sysLog['SysLog']['system_name']; ?>&nbsp;</td>
		<td><?php echo $sysLog['SysLog']['brower_name']; ?>&nbsp;</td>
		<td><?php echo $sysLog['SysLog']['ip']; ?>&nbsp;</td>
		<td><?php echo $sysLog['SysLog']['page_name']; ?>&nbsp;</td>
		<td><?php echo $sysLog['SysLog']['type']; ?>&nbsp;</td>
		<td><?php echo $sysLog['SysLog']['module_id']; ?>&nbsp;</td>
		<td><?php echo $sysLog['SysLog']['created']; ?>&nbsp;</td>
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