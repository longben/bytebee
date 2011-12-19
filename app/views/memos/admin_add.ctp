<div class="memos form">
<?php echo $this->Form->create('Memo');?>
	<fieldset>
 		<legend><?php __('Admin Add Memo'); ?></legend>
	<?php
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Memos', true), array('action' => 'index'));?></li>
	</ul>
</div>