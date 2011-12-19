<div style="padding:5px;background:#efefef;width:99%;">
	<span style="float:right;white-space:nowrap;clear: none;overflow:hidden; page-break-before: always;page-break-after: always;width:270px">
		<form method="post" action="" accept-charset="utf-8">
			<input type="text" name="data[k]" style="width:150px;font-size:9pt;line-height:21px;"/>
			<input type="image"  style="width:78px;height:21px;border:0px"  src="/img/search.jpg"/>
		</form>
	</span>
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
		<td><?php echo $post['Post']['post_title']; ?></td>
		<td><?php echo __($post['Post']['post_status']); ?></td>
		<td><?php echo $post['Post']['post_date']; ?></td>
		<td class="actions">
		<?php 
		if(1 == $post['Meta']['elite']){
			echo $html->link(__('取消推荐', true), array('action'=>'update_elite', $post['Post']['id']));
        }else{
            echo $html->link(__('首页推荐', true), array('action'=>'update_elite', $post['Post']['id']));
		}
		?>
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
            
            
