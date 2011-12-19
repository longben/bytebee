<?php $javascript->link(array('dtree'), false);?>
<div class="roles form">
<?php echo $form->create('Role', array('id' => 'bbForm'));?>
	<fieldset>
 		<legend><?php __('Add Role');?></legend>
	<?php
		echo $form->input('name', array('class' => 'required',  'title' =>__('请输入角色名称', true)));
		echo $form->end(__('保存',true));
	?>
	</fieldset>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Roles', true), array('action'=>'index'));?></li>
	</ul>
</div>
