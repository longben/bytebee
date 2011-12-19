<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->script(array('jquery-1.6.1', 'jquery.easyui.min' ,'colorbox/jquery.colorbox', 'jquery.validate.min'));
		echo $this->Html->css(array('bitbee.generic', 'default' ,'colorbox/theme5/colorbox', 'cmxform', 'themes/default/easyui','themes/icon'));
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
			
			$(".role").colorbox({
				width:"350px", height:"500px", iframe:true
			});		
			
			$(".content").colorbox({
				width:"90%", height:"90%", iframe:true
			});		
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
			
			//表单校验
			$("#bbForm").validate(); 
			
			//表单日期格式化
			/*
			$('#dd').datebox({  
				formatter: function(date){ return date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate(); },  
				parser: function(date){ return new Date(Date.parse(date.replace(/-/g,"/"))); }  
			}); 
			*/
			
			//信息提示显示
			if ( $('#flashMessage').text() != '') {
				$.messager.alert('信息提示','<font color=blue>' + $('#flashMessage').text() + '</font>','info');
				$('#flashMessage').text("");
			}

            //关闭ColorBox窗口
			<?php if(!empty($close_colorbox)):?>
			parent.$.fn.colorbox.close();
			<?php endif?>			
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
</body>
</html>