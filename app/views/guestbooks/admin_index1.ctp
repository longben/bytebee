<div class="guestbooks">
	<table cellpadding="0" cellspacing="0">
	<tr>
            <th width="50px">留言者</th>    
			<th>留言内容</th>
			<th>电话号码</th>
			<th>电子邮箱</th>
			<th width="50px">是否回复</th>
			<th>留言时间</th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($guestbooks as $guestbook):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
        <td><?php echo $guestbook['Guestbook']['username']; ?>&nbsp;</td>
		<td><?php echo $guestbook['Guestbook']['content']; ?>&nbsp;</td>	
		<td><?php echo $guestbook['Guestbook']['telephone']; ?>&nbsp;</td>
		<td><?php echo $guestbook['Guestbook']['email']; ?>&nbsp;</td>
		<td><?php echo $guestbook['Guestbook']['flag']==1?'已回复':'未回复'; ?>&nbsp;</td>
		<td><?php echo $guestbook['Guestbook']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('留言处理', true), array('action' => 'edit', $guestbook['Guestbook']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $guestbook['Guestbook']['id']), null, sprintf(__('你是否要删除这条留言？', true), $guestbook['Guestbook']['id'])); ?>
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
