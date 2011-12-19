<div style="padding:5px;background:#fff;width:99%;">
	<?php echo $html->link(__('新增模块', true), array('action'=>'add'), array('class'=>'easyui-linkbutton', 'icon'=>'icon-add')); ?>
</div>

<div class="modules">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('type');?></th>
	<th><?php echo $paginator->sort('parent_id');?></th>
	<th><?php echo $paginator->sort('hierarchy');?></th>
	<th><?php echo $paginator->sort('node');?></th>
	<th><?php echo $paginator->sort('module_image');?></th>
	<th><?php echo $paginator->sort('url');?></th>
	<th><?php echo $paginator->sort('flag');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($modules as $module):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $module['Module']['id']; ?>
		</td>
		<td>
			<?php echo $module['Module']['name']; ?>
		</td>
		<td>
			<?php echo $module['Module']['type']; ?>
		</td>
		<td>
			<?php echo $module['Module']['parent_id']; ?>
		</td>
		<td>
			<?php echo $module['Module']['hierarchy']; ?>
		</td>
		<td>
			<?php echo $module['Module']['node']; ?>
		</td>
		<td>
			<?php echo $module['Module']['module_image']; ?>
		</td>
		<td>
			<?php echo $module['Module']['url']; ?>
		</td>
		<td>
			<?php echo $module['Module']['flag']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $module['Module']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $module['Module']['id'])); ?>
			<?php 
			  if($module['Module']['delete_permit'] == 1)
			  echo $html->link(__('Delete', true), array('action'=>'delete', $module['Module']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $module['Module']['id'])); 
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>