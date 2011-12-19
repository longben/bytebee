<div style="padding:5px;background:#fff;width:99%;">
    <?php echo $html->link(__('新增招聘信息', true), array('action'=>'add'), array('class'=> 'easyui-linkbutton', 'icon' => 'icon-add')); ?>
    <a href="#" class="easyui-linkbutton" icon="icon-reload">刷新</a>
    <a href="#" class="easyui-linkbutton" icon="icon-search">复杂查询</a>
    <a href="#" class="easyui-linkbutton" icon="icon-help">帮助</a>
</div>

<div class="recruitments">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('position_id');?></th>
	<th><?php echo $paginator->sort('department_id');?></th>
	<th><?php echo $paginator->sort('region_id');?></th>
	<th><?php echo $paginator->sort('skill_id');?></th>
	<th><?php echo $paginator->sort('招聘人数','number');?></th>
	<th><?php echo $paginator->sort('publish_date');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($recruitments as $recruitment):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $recruitment['Position']['name']; ?>
		</td>
		<td>
			<?php echo $recruitment['Department']['name']; ?>
		</td>
		<td>
			<?php echo $recruitment['Region']['name']; ?>
		</td>
		<td>
			<?php echo $recruitment['Skill']['name']; ?>
		</td>
		<td>
			<?php echo $recruitment['Recruitment']['number']; ?>
		</td>
		<td>
			<?php echo date('Y-m-d', strtotime($recruitment['Recruitment']['publish_date'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $recruitment['Recruitment']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $recruitment['Recruitment']['id']), null, sprintf(__('你是否要删除招聘职位为“%s”的招聘信息?', true), $recruitment['Position']['name'])); ?>
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

