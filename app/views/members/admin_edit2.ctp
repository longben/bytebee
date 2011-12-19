<?php echo $this->Html->script(array('swfupload/swfupload', 'swfupload/plugins/swfupload.swfobject', 'swfupload/implement/forms/fileprogress', 'swfupload/implement/forms/handlers2'), false); ?>
<script type="text/javascript">
		var swfu;

		window.onload = function () {
			swfu = new SWFUpload({
				// Backend settings
				upload_url : "<?php echo $html->url('/members/upload/'.$session->id()) ?>",
				file_post_name: "uploadFile",
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},

				// Flash file settings
				file_size_limit : "2 MB",
				file_types : "*.jpg;*.gif;*.png",  // or you could use something like: "*.doc;*.wpd;*.pdf",
				file_types_description : "个人照片",
				file_upload_limit : "0",
				file_queue_limit : "1",

				// Event handler settings
				swfupload_loaded_handler : swfUploadLoaded,
				
				file_dialog_start_handler: fileDialogStart,
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				
				//upload_start_handler : uploadStart,	// I could do some client/JavaScript validation here, but I don't need to.
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,

				// Button Settings
				button_image_url : "<?php echo $html->url('/img/XPButtonUploadText_61x22.png')?>",
				button_placeholder_id : "spanButtonPlaceholder",
				button_width: 61,
				button_height: 22,
				
				// Flash Settings
				flash_url : "<?php echo $html->url('/js/swfupload/swfupload.swf')?>",

				custom_settings : {
					progress_target : "fsUploadProgress",
					upload_successful : false
				},
				
				// Debug settings
				debug: false
			});

		};
</script>

<div class="members form">
<?php echo $form->create('Member', array('url' => $html->here));?>
	<fieldset>
 		<legend><?php __('编辑用户资料');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('gender', array('type' => 'select', 'options' => array('1' => '男', '2' => '女')));
		echo $form->input('cell_number');
		echo $form->input('telphone_number');
		echo $form->input('Meta.description', array('label' => '个人简介', 'type' => 'textarea'));
	?>
		<div class="input text">
		  <label>个人照片</label>
		  <input name="uploadFile" type="text" readOnly="true" id="uploadFile" style="width:200px"/>
		  <span id="spanButtonPlaceholder"></span>(最大2M图片)
		  <div class="flash" id="fsUploadProgress"></div>
		  <input type="hidden" name="hidFileID" id="hidFileID" value="" />
		</div>

    <?php echo $this->Form->end(array('label' => '确定', 'id' => 'btnSubmit'));?>		
	</fieldset>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('返回用户列表', true), array('action'=>'index2'));?></li>
		<img src="/files/user/<?=$this->Form->value('Meta.avatar')?>" width="180px"/>
	</ul>
</div>