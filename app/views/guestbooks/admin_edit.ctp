<div class="guestbooks form">
<?php echo $this->Form->create('Guestbook');?>
	<fieldset>
 		<legend><?php __('客户反馈回复'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('content', array('type' => 'textarea', 'label' => '留言内容'));
        echo $this->Form->input('reply_content', array('type' => 'textarea', 'label' => '你的回复内容'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Guestbook.id')), null, sprintf(__('你是否要删除这条留言？', true), $this->Form->value('Guestbook.id'))); ?></li>
		<li><?php echo $this->Html->link(__('返回客户反馈列表', true), array('action' => 'index'));?></li>
	</ul>
</div>