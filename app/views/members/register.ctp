<div class="c_30201"></div>
<div class="othermiddle">
  	<div id="Scroller-1">
	  <div class="Scroller-Container">
		<div class="register">
		<?php echo $form->create('Member', array('url' => $this->here));?>
			<fieldset>
				<legend><?php __('家长注册申请');?></legend>
				<div>注册用途说明：注册用途说明：注册用途说明：注册用途说明：注册用途说明：注册用途说明：注册用途说明：注册用途说明：注册用途说明：</div>
				<br/>
				<div>使用方法说明：</div>
				<br/>
			<?php
				echo $form->input('login_name',array('label' => '电子邮箱：'));
				echo $form->input('password',array('label' => '登录口令：'));
				echo $form->input('password2',array('label' => '验证口令：'));
				echo $form->input('name',array('label' => '家长姓名：'));
				echo $form->input('cell_number', array('label' => '手机号码：'));
				echo $form->input('address', array('label' => '家庭住址：'));
				echo $form->hidden('nation_id', array('value' => 1));
				echo $form->input('telphone_number', array('label' => '联系号码：'));
				echo $form->input('grade_id', array('label' => '就读班级：'));
				echo "<br/><br/>";
				echo $form->submit('提交注册申请');
			?>
			</fieldset>
		<?php echo $form->end();?>
		</div>
      </div>
	</div>
  </div>