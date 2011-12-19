<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $html->charset('UTF-8');?>
<title>Platforms</title>
<?php header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");?>
<meta http-equiv="pragma" content="no-cache"/>
<meta http-equiv="cache-control" content="no-cache"/>
<meta http-equiv="expires" content="0"/>
<link rel="icon" href="<?php echo $this->webroot . 'favicon.ico';?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $this->webroot . 'favicon.ico';?>" type="image/x-icon" />
<?php 
  echo $html->css('bitbee.generic');
  echo $scripts_for_layout;
?>

</head>
<body scroll='no'>
	<div id="container">
	   <?php
	   if ($session->check('Message.flash')){
	   	  $session->flash();
	   ?>
	      <SCRIPT LANGUAGE="JavaScript">
	      <!--
			element = document.getElementById("flashMessage");
			element.style.display = "none";
			alert(element.innerHTML);
	      //-->
	      </SCRIPT>
	   <?php
	   }
	   echo $content_for_layout;
	   ?>
	</div>
</body>
</html>