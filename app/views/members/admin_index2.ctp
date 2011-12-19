<div class="members">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo '登录名';?></th>
	<th><?php echo '姓名';?></th>
	<th><?php echo $paginator->sort('gender');?></th>
	<th><?php echo $paginator->sort('cell_number');?></th>
	<th><?php echo $paginator->sort('telphone_number');?></th>
	<th><?php echo '个人网站';?></th>
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
			<?php echo $member['User']['user_login']; ?>
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
		<td class="actions">
			<?php echo $html->link(__('Edit', true), array('action'=>'edit2', $member['Member']['id'])); ?>
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