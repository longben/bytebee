<div style="padding:5px;background:#fff;width:99%;">
    <a href="<?=$this->Html->url('/admin/attachments/add/')?>" class="easyui-linkbutton" icon="icon-add">新增</a>
    <a href="#" class="easyui-linkbutton" icon="icon-reload">刷新</a>
</div>

<div class="Attachments">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>ID</th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th>文档备注</th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($attachments as $a):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $a['Attachment']['id']; ?>&nbsp;</td>
		<td><?php echo $a['Attachment']['name']; ?>&nbsp;</td>
		<td><?php echo $a['Attachment']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $a['Attachment']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $a['Attachment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $a['Attachment']['id'])); ?>
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