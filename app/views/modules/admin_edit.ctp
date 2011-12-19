<div class="modules form">
<?php echo $form->create('Module');?>
	<fieldset>
 		<legend><?php __('Edit Module');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('type');
		echo $form->input('parent_id');
		echo $form->input('node');
		echo $form->input('module_image');
		echo $form->input('url');
		echo $form->input('flag');
		echo $form->submit('Submit');
	?>
	</fieldset>
<?php echo $form->end();?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Module.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Module.id'))); ?></li>
		<li><?php echo $html->link(__('List Modules', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Modules', true), array('controller'=> 'modules', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Parent', true), array('controller'=> 'modules', 'action'=>'add')); ?> </li>
	</ul>
</div>
