<div class="members form">
<?php echo $form->create('Member',array('url' => $this->here));?>
	<fieldset>
 		<legend><?php __('个人信息');?></legend>
	<?php
	    echo $form->input('id');
		echo $form->input('User.ID');
		echo $form->input('name', array('label' => '姓名'));
		echo $form->input('gender', array('type' => 'select', 'options' => array('1' => '男', '0' => '女')));
		echo $form->input('telphone_number');
		echo $form->input('cell_number');
		echo $form->hidden('nation_id', array('value' => 1));
		echo $form->submit('保存');
	?>
	</fieldset>
<?php echo $form->end();?>
</div>