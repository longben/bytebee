<div class="recruitments view">
<h2><?php  __('Recruitment');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recruitment['Recruitment']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Position'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($recruitment['Position']['name'], array('controller'=> 'positions', 'action'=>'view', $recruitment['Position']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Skill'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($recruitment['Skill']['name'], array('controller'=> 'skills', 'action'=>'view', $recruitment['Skill']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Department'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($recruitment['Department']['name'], array('controller'=> 'departments', 'action'=>'view', $recruitment['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recruitment['Recruitment']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Experience'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recruitment['Recruitment']['total_experience']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recruitment['Recruitment']['number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Region'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($recruitment['Region']['name'], array('controller'=> 'regions', 'action'=>'view', $recruitment['Region']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recruitment['Recruitment']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Publish Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recruitment['Recruitment']['publish_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Begin Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recruitment['Recruitment']['begin_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recruitment['Recruitment']['end_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Flag'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recruitment['Recruitment']['flag']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Recruitment', true), array('action'=>'edit', $recruitment['Recruitment']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Recruitment', true), array('action'=>'delete', $recruitment['Recruitment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recruitment['Recruitment']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Recruitments', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Recruitment', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Positions', true), array('controller'=> 'positions', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Position', true), array('controller'=> 'positions', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Skills', true), array('controller'=> 'skills', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Skill', true), array('controller'=> 'skills', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Departments', true), array('controller'=> 'departments', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Department', true), array('controller'=> 'departments', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Regions', true), array('controller'=> 'regions', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Region', true), array('controller'=> 'regions', 'action'=>'add')); ?> </li>
	</ul>
</div>
