<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('form-structure', 'form-style', 'themes/default/easyui','themes/icon', 'colorbox/theme5/colorbox', 'cmxform'));
		echo $this->Html->script(array('jquery-1.6.4.min', 'jquery.easyui.min', 'colorbox/jquery.colorbox', 'jquery.validate.min', 'formee'));
		echo $scripts_for_layout;
	?>
<script type="text/javascript">
	$(document).ready(function(){
		//Examples of how to assign the ColorBox event to elements
		$("a[rel='example1']").colorbox();
		$("a[rel='example2']").colorbox({transition:"fade"});
		$("a[rel='example3']").colorbox({transition:"none", width:"75%", height:"75%"});
		$("a[rel='example4']").colorbox({slideshow:true});
		$(".example5").colorbox();
		$(".example6").colorbox({iframe:true, innerWidth:425, innerHeight:344});
		$(".example7").colorbox({width:"90%", height:"90%", iframe:true, current: "文章编辑 {current} of {total}"});
		$(".example8").colorbox({width:"50%", inline:true, href:"#inline_example1"});
		$(".example9").colorbox({
			onOpen:function(){ alert('onOpen: colorbox is about to open'); },
			onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
			onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
			onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
			onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
		});
		
		$(".code").colorbox({
		    width:"50%", height:"60%", iframe:true
		});
		
		$(".content").colorbox({
		    width:"90%", height:"90%", iframe:true
		});		
		
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});

</script>

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
    <!--
      element = document.getElementById("flashMessage");
      if(element != null){
        element.style.display = "none";
        alert(element.innerHTML);  
      }
    //-->
    </SCRIPT>	
</body>
</html>