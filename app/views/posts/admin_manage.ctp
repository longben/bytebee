<div style="padding:5px;background:#efefef;width:99%;">
	<span style="float:right;white-space:nowrap;clear: none;overflow:hidden; page-break-before: always;page-break-after: always;width:270px">
		<form method="post" action="" accept-charset="utf-8">
			<input type="text" name="data[k]" style="width:150px;font-size:9pt;line-height:21px;"/>
			<input type="image"  style="width:78px;height:21px;border:0px"  src="/img/search.jpg"/>
		</form>
	</span>
    <a href="/admin/posts/add/<?=$category_id?>/<?=$category_name?>" class="easyui-linkbutton" iconCls="icon-add">新增</a>
	<!--
    <a href="#" class="easyui-linkbutton" iconCls="icon-reload">刷新</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-search">复杂查询</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-help">帮助</a>
	-->
</div>

<div id="demo">
<table cellpadding="0" cellspacing="0" class="display" id="example">
    <thead>
	<tr>
		<th><?php echo __('Post Title');?></th>
		<th><?php echo __('Post Status');?></th>
		<th><?php echo __('Post Date');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	</thead>
	<?php foreach ($posts as $post):?>
	<tr>
		<td><a href='/app/content/<?php echo $post['Post']['id']; ?>' target='_blank'><?php echo $post['Post']['post_title']; ?></a></td>
		<td><?php echo __($post['Post']['post_status']); ?></td>
		<td><?php echo $post['Post']['post_date']; ?></td>
		<td class="actions">
		  <?php echo $html->link(__('Edit', true), array('action'=>'edit', $post['Post']['id'], $post['Meta']['category'], $category_name)); ?>
		  <?php echo $html->link(__('Delete', true), array('action'=>'delete', $post['Post']['id'], $post['Meta']['category'], $category_name), null, sprintf(__('你是否要删除《%s》这篇文章？', true), $post['Post']['post_title'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array("url"=>array("k"=>$k)), null, array('class'=>'disabled'));?>
 | 	<?php //echo $paginator->numbers(array("url"=>array("k"=>$k)));?>
	<?php echo $paginator->next(__('next', true).' >>', array("url"=>array("k"=>$k)), null, array('class'=>'disabled'));?>
</div>