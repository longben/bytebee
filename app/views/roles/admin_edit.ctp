<div class="roles form">
<?php echo $form->create('Role', array('id' => 'bbForm'));?>
	<fieldset>
 		<legend><?php __('Edit Role');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name', array('class' => 'required',  'title' =>__('请输入角色名称', true)));
		echo $form->input('flag',array('type' => 'select','options' => array('0' => '无效','1' => '有效')));
		echo $form->end(__('保存',true));
	?>
	</fieldset>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Roles', true), array('action'=>'index'));?></li>
	</ul>
</div>
