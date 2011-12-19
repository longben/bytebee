<script type="text/javascript">
	function openAuthorization(url) {
		$('#w').html('<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>');
		$('#w').window({
			title: '角色授权',
			width: 300,
			height: 500,			
            top:10,  
            left:($(window).width() - 300) * 0.5,			
			modal: true,
			shadow: true,
			closed: false,
			resizable:false
		});
	}
</script>

<div style="padding:5px;background:#fff;width:99%;">
	<?php echo $html->link(__('新增角色', true), array('action'=>'add'), array('class'=>'easyui-linkbutton', 'icon'=>'icon-add')); ?>
</div>
<div class="roles">
<table cellpadding="0" cellspacing="0">
<tr>
    <th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('flag');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($roles as $role):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $role['Role']['name']; ?>
		</td>
		<td>
			<?php echo $role['Role']['flag']?(__('有效',true)):(__('无效',true)); ?>
		</td>
		<td>
			<?php echo $role['Role']['created']; ?>
		</td>
		<td class="actions">
			<a href="javascript:openAuthorization('/admin/roles/authorization/<?php echo $role['Role']['id']?>');">授权1</a>
			<?php echo $html->link(__('Authorization', true), array('action'=>'authorization', $role['Role']['id']), array('title' => __('Authorization',true), 'class' => 'role')); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $role['Role']['id'])); ?>
			<?php
				if($role['Role']['id'] > 5) {
					echo $html->link(__('Delete', true), array('action'=>'delete', $role['Role']['id']), null, sprintf(__('您确认要删除该角色?', true), $role['Role']['id'])); 					
				}
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

<!--修改密码窗口-->
<div id="w" class="easyui-window" title="角色授权" collapsible="false" minimizable="false" maximizable="false" closed="true" icon="icon-save"  style="background: #fafafa;">
</div>