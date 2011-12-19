<div class="positions index">
<h2><?php __('职位管理');?></h2>
<p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($positions as $position):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $position['Position']['id']; ?>
		</td>
		<td>
			<?php echo $position['Position']['name']; ?>
		</td>
		<td>
			<?php echo $position['Position']['description']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $position['Position']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $position['Position']['id']), null, sprintf(__('你是否要删除名称为“%s”的职位?', true), $position['Position']['name'])); ?>
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
		<li><?php echo $html->link(__('新增职位', true), array('action' => 'add')); ?></li>
	</ul>
</div>
