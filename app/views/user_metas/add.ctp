<div class="userMetas form">
<?php echo $this->Form->create('UserMeta');?>
	<fieldset>
 		<legend><?php __('Add User Meta'); ?></legend>
	<?php
		echo $this->Form->input('role_id');
		echo $this->Form->input('last_ip');
		echo $this->Form->input('login_count');
		echo $this->Form->input('cookie_token');
		echo $this->Form->input('flag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List User Metas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Roles', true), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role', true), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>