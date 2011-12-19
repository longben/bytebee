<div class="commodities form">
<?php echo $this->Form->create('Commodity');?>
	<fieldset>
		<legend><?php __('Admin Add Commodity'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('alias');
		echo $this->Form->input('type_id');
		echo $this->Form->input('price');
		echo $this->Form->input('point');
		echo $this->Form->input('is_new');
		echo $this->Form->input('is_recommend');
		echo $this->Form->input('picture');
		echo $this->Form->input('description');
		echo $this->Form->input('valid_from');
		echo $this->Form->input('valid_thru');
		echo $this->Form->input('flag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Commodities', true), array('action' => 'index'));?></li>
	</ul>
</div>