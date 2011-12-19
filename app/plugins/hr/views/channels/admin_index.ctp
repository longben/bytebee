<div class="channels index">
<h2><?php __('招聘渠道管理');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('parent_id');?></th>
	<th><?php echo $paginator->sort('begin_date');?></th>
	<th><?php echo $paginator->sort('end_date');?></th>
	<th><?php echo $paginator->sort('expenses');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($channels as $channel):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $channel['Channel']['id']; ?>
		</td>
		<td>
			<?php echo $channel['Channel']['name']; ?>
		</td>
		<td>
			<?php echo $channel['Channel']['parent_id']; ?>
		</td>
		<td>
			<?php echo $channel['Channel']['begin_date']; ?>
		</td>
		<td>
			<?php echo $channel['Channel']['end_date']; ?>
		</td>
		<td>
			<?php echo $channel['Channel']['expenses']; ?>
		</td>
		<td>
			<?php echo $channel['Channel']['description']; ?>
		</td>
		<td class="actions">
			<?php 
				if($channel['Channel']['parent_id'] == 0) {
					echo "系统渠道分类";
				}else{ 
			?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $channel['Channel']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $channel['Channel']['id']), null, sprintf(__('你是否要删除名称为“%s”的渠道?', true), $channel['Channel']['name'])); ?>
			<?php	}?>
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
		<li><?php echo $html->link(__('新增招聘渠道', true), array('action' => 'add')); ?></li>
	</ul>
</div>
