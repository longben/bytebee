<div class="skills form">
<?php echo $form->create('Skill', array('id' => 'bbForm'));?>
	<fieldset>
 		<legend><?php __('编辑职能');?></legend>
	<?php
	    echo $form->input('id');
		echo $form->input('name', array('class' => 'required',  'title' =>__('请输入职能名称', true)));
		echo $form->input('description', array('class' => 'required',  'title' =>__('请输入职能描述', true), 'type' => 'textarea', 'rows' => 3));
		echo $form->end('确定');
	?>
	</fieldset>
</div>