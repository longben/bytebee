<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<script type="text/javascript">
      var GB_ROOT_DIR = "<?=$html->url('/js/greybox/')?>";
    </script>	
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('bitbee.generic', 'default', 'colorbox/theme5/colorbox', 'cmxform', 'themes/default/easyui','themes/icon'));
		echo $this->Html->script(array('jquery-1.4.4.min', 'jquery.easyui.min', 'dtree','colorbox/jquery.colorbox', 'jquery.validate.min'));
		echo $scripts_for_layout;
	?>	
</head>
<body class="easyui-layout">
	<?php echo $this->Session->flash(); ?>
	<?php echo $content_for_layout; ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>