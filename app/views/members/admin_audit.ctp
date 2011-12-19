<div class="members index">
<h2><?php __('待审核会员列表');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo '登录名';?></th>
	<th><?php echo '姓名';?></th>
	<th><?php echo $paginator->sort('gender');?></th>
	<th><?php echo $paginator->sort('cell_number');?></th>
	<th><?php echo $paginator->sort('telphone_number');?></th>
	<th><?php echo '个人网站';?></th>
	<th><?php echo '所属班级';?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($members as $member):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $member['User']['login_name']; ?>
		</td>
		<td>
			<?php echo $member['Member']['name']; ?>
		</td>
		<td>
			<?php echo $member['Member']['gender']==1?'男':'女'; ?>
		</td>
		<td>
			<?php echo $member['Member']['cell_number']; ?>
		</td>
		<td>
			<?php echo $member['Member']['telphone_number']; ?>
		</td>
		<td>
			<?php echo $member['Member']['site']; ?>
		</td>
		<td>
			<?php echo $html->link($member['Grade']['name'], array('controller'=> 'grades', 'action'=>'view', $member['Grade']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $member['Member']['id'])); ?>
			<?php echo $html->link(__('审核', true), array('action'=>'audition', $member['Member']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $member['Member']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>