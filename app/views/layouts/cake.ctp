<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('cake.generic','default','themes/default/easyui','themes/icon', 'colorbox/theme5/colorbox', 'cmxform'));
		echo $this->Html->script(array('jquery-1.6.4.min', 'jquery.easyui.min','jquery-validation/jquery.validate.min', 'jquery-validation/localization/messages_cn'));
		echo $scripts_for_layout;
	?>

	<script type="text/javascript">
	$().ready(function() {
		// validate the comment form when it is submitted
		$("#bbForm").validate();
	});
	</script>

</head>
<body>
	<div id="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
    <SCRIPT LANGUAGE="JavaScript">
	//信息提示显示
	if ( $('#flashMessage').text() != '') {
		$.messager.alert('信息提示','<font color=blue>' + $('#flashMessage').text() + '</font>','info');
		$('#flashMessage').text("");
	}
    </SCRIPT>	
</body>
</html>