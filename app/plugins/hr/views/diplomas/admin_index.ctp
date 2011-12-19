<div class="diplomas index">
<h2><?php __('学历管理');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($diplomas as $diploma):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $diploma['Diploma']['id']; ?>
		</td>
		<td>
			<?php echo $diploma['Diploma']['name']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $diploma['Diploma']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $diploma['Diploma']['id']), null, sprintf(__('你是否要删除名称为“%s”的学历?', true), $diploma['Diploma']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('新增学历', true), array('action' => 'add')); ?></li>
	</ul>
</div>
