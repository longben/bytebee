<div class="positions form">
<?php echo $form->create('Position', array('id' => 'bbForm'));?>
	<fieldset>
 		<legend><?php __('编辑职位');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name', array('class' => 'required',  'title' =>__('请输入职位名称', true)));
		echo $form->input('description', array('class' => 'required',  'title' =>__('请输入职位描述', true), 'type' => 'textarea', 'rows' => 3));
		echo $form->end('确定');
	?>
	</fieldset>
</div>