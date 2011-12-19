<div class="skills index">
<h2><?php __('职能管理');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($skills as $skill):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $skill['Skill']['id']; ?>
		</td>
		<td>
			<?php echo $skill['Skill']['name']; ?>
		</td>
		<td>
			<?php echo $skill['Skill']['description']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $skill['Skill']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $skill['Skill']['id']), null, sprintf(__('你确认是否删除名称为“%s”的职能?', true), $skill['Skill']['name'])); ?>
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
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('新增职能', true), array('action'=>'add')); ?></li>
	</ul>
</div>
