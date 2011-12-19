<div class="members form">
<?php echo $form->create('Member');?>
	<fieldset>
 		<legend><?php __('Add Member');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('gender');
		echo $form->input('cell_number');
		echo $form->input('company');
		echo $form->input('address');
		echo $form->input('city');
		echo $form->input('state');
		echo $form->input('postcode');
		echo $form->input('telphone_number');
		echo $form->input('fax_number');
		echo $form->input('site');
		echo $form->input('status');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Members', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
