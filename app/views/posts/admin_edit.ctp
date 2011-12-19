<?php
echo $javascript->link('ckeditor/ckeditor', NULL, false);
echo $javascript->link('ckfinder/ckfinder', NULL, false);
?>

<div title="发表信息" style="padding: 0px; overflow: hidden;" icon="icon-add">
	<fieldset>
	    <legend><?php __('编辑文章内容');?></legend> 
		<?php 
			echo $form->create('Post', array('action' => 'add/'.$category_id.'/'.$category_name, 'name' => 'bbForm', 'id' => 'bbForm'));
			echo $form->input('id');
			echo $form->input('post_title', array('type' => 'text', 'class' => 'required', 'title' =>__('请输入标题', true)));
			echo $form->input('post_content');
			echo $ck->load('Post.post_content');
			echo $form->hidden('category', array('value' => $category_id));
			echo $form->hidden('category_name', array('value' => $category_name));
			echo $form->hidden('Module', array('value' => $category_id));
			echo $form->hidden('post_type', array('value' => 'post'));
			echo $form->submit('保存');
			echo $form->end();
		?>
	</fieldset>
</div>