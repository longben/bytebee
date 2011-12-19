<div class="modules form">
<?php echo $form->create('Module');?>
	<fieldset>
 		<legend><?php __('Add Module');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('type');
		echo $form->input('parent_id');
		echo $form->input('module_image');
		echo $form->input('url');
		echo $form->submit('Submit');
	?>
	</fieldset>
<?php echo $form->end();?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('返回模块列表', true), array('action'=>'index'));?></li>
	</ul>
</div>
