<div class="members form">
<?php echo $form->create('Member', array('id' => 'bbForm'));?>
	<fieldset>
 		<legend><?php __('添加用户');?></legend>
	<?php
		echo $form->input('login_name', array('class' => 'required',  'title' =>__('请输入登录名', true)));
		echo $form->input('name', array('label' => '姓名', 'class' => 'required',  'title' =>__('请输入姓名', true)));
		echo $form->input('email', array('class' => 'required email',  'title' =>__('请输入邮箱地址', true)));
		echo $form->input('password', array('class' => 'required',  'title' =>__('请输入密码', true)));
		echo $form->input('gender', array('type' => 'select', 'options' => array('1' => '男', '0' => '女'), 'default' => '1'));
		echo $form->input('telphone_number');
		echo $form->input('cell_number');
		//echo $form->input('site', array('label' => '个人博客'));
		//echo $form->hidden('role_id', array('value' => ROLE_DEFAULT ));
		echo $form->input('role_id');
		echo $form->input('department_id');
		echo $form->submit('保存');
	?>
	</fieldset>
<?php echo $form->end();?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('返回用户列表', true), array('action'=>'index'));?></li>
	</ul>
</div>