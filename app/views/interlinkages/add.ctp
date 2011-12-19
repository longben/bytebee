<div class="interlinkages form">
<?php echo $this->Form->create('Interlinkage');?>
	<fieldset>
 		<legend><?php __('Add Interlinkage'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('type_id');
		echo $this->Form->input('file_path');
		echo $this->Form->input('url');
		echo $this->Form->input('tag');
		echo $this->Form->input('description');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Interlinkages', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Codes', true), array('controller' => 'codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'codes', 'action' => 'add')); ?> </li>
	</ul>
</div>