<?php echo $this->Html->script(array('swfupload/swfupload', 'swfupload/plugins/swfupload.swfobject', 'swfupload/implement/forms/fileprogress', 'swfupload/implement/forms/handlers2'), false); ?>
<script type="text/javascript">
		var swfu;

		window.onload = function () {
			swfu = new SWFUpload({
				// Backend settings
				upload_url : "<?php echo $html->url('/attachments/upload/'.$session->id()) ?>",
				file_post_name: "uploadFile",
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},

				// Flash file settings
				file_size_limit : "30 MB",
				file_types : "*.doc;*.xls;*.rar;*.pdf;*.jpg;*.gif;*.bmp;",  // or you could use something like: "*.doc;*.wpd;*.pdf",
				file_types_description : "文件",
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

<div class="pictures form">
<?php echo $this->Form->create('Attachment', array('id' => 'bbForm'));?>
	<fieldset>
 		<legend><?php __('添加文件'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => '文件名称', 'class' => 'required',  'title' =>__('请输入文件名称', true)));
		// echo $this->Form->input('document_type_id', array('label' => '文件类型'));
		// echo $this->Form->input('description', array('label' => '文件备注', 'type' => 'textarea'));
	?>
		<div class="input text">
		  <label for="PicturePicture">供下载的文件</label>
		  <input name="uploadFile" type="text" readOnly="true" id="uploadFile" />
		  <span id="spanButtonPlaceholder"></span>(最大30M大小的文件)
		  <div class="flash" id="fsUploadProgress"></div>
		  <input type="hidden" name="hidFileID" id="hidFileID" value="" />
		</div>		
	</fieldset>
<?php echo $this->Form->end(array('label' => '提交', 'id' => 'btnSubmit'));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('返回下载文件列表', true), array('action' => 'index'));?></li>
	</ul>
</div>