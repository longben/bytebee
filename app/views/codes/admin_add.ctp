<div class="codes form">
<?php echo $this->Form->create('Code');?>
	<fieldset>
 		<legend><?php __('Admin Add Code'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('category');
		echo $this->Form->input('description');
		echo $this->Form->input('editable');
		echo $this->Form->input('flag');
		echo $this->Form->input('locale');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Codes', true), array('action' => 'index'));?></li>
	</ul>
</div>