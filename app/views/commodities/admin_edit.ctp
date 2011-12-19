<div class="commodities form">
<?php echo $this->Form->create('Commodity');?>
	<fieldset>
		<legend><?php __('Admin Edit Commodity'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Commodity.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Commodity.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Commodities', true), array('action' => 'index'));?></li>
	</ul>
</div>