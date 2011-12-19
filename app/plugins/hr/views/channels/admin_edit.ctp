<div class="channels form">
<?php echo $form->create('Channel', array('id' => 'bbForm'));?>
	<fieldset>
 		<legend><?php __('编辑招聘渠道');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name', array('class' => 'required',  'title' =>__('请输入渠道名称', true)));
		echo $form->input('parent_id', array('label' => '选择渠道类别'));
		echo $form->input('begin_date', array('type'=>'date', 'dateFormat' => 'YMD'));
		echo $form->input('end_date', array('type'=>'date', 'dateFormat' => 'YMD'));
		echo $form->input('expenses', array('class' => 'required',  'title' =>__('请输入费用', true)));
		echo $form->input('description', array('type' => 'textarea', 'rows' => 3));
		echo $form->end('确定');
	?>
	</fieldset>
</div>