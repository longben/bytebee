<div class="members form">
<?php echo $form->create('Member',array('url' => $this->here,'id' => 'bbForm', 'class' => 'niceform'));?>
	<fieldset>
 		<legend><?php __('修改密码');?></legend>

	<?php
		echo $form->hidden('id');
		echo $form->input('old_password', array('type' => 'password', 'label' => '旧密码', 'class' => 'required minlength', 'title' =>__('请输入密码，密码位数不能小于5位。', true),'alt' => '{params:5}'));
		echo $form->input('new_password', array('type' => 'password', 'label' => '新密码', 'class' => 'required minlength', 'title' =>__('请输入密码，密码位数不能小于5位。', true),'alt' => '{params:5}'));
		echo $form->input('confirm_password', array('type' => 'password', 'label' => '确认新密码', 'class' => 'required minlength', 'title' =>__('请输入正确的确认密码。', true), 'alt'=>'{params:5}'));
		echo $form->end(__('保存',true));
	?>
	</fieldset>
</div>
