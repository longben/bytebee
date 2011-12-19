<div class="diplomas form">
<?php echo $form->create('Diploma', array('id' => 'bbForm'));?>
	<fieldset>
 		<legend><?php __('新增学历');?></legend>
	<?php
		echo $form->input('name', array('class' => 'required',  'title' =>__('请输入学历名称', true)));
		echo $form->end('确定');
	?>
	</fieldset>
</div>