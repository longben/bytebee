<div class="members form">
<?php echo $form->create('Member');?>
	<fieldset>
 		<legend><?php __('编辑会员资料');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('Meta.role_id');
		echo $form->input('gender', array('type' => 'select', 'options' => array('1' => '男', '2' => '女')));
		echo $form->input('cell_number');
		echo $form->input('telphone_number');
		echo $form->end('确定');
	?>
	</fieldset>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('返回用户列表', true), array('action'=>'index'));?></li>
	</ul>
</div>