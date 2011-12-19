<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo $title_for_layout; ?></title>
<?php
echo $this->Html->meta('icon');
echo $this->Html->css(array('screen', 'jquery-ui/pepper-grinder/jquery-ui-1.8.4.custom' , 'table/demo_table_jui','table/demo_table', 'themes/default/easyui', 'themes/icon',));
//if(isset($javascript)):
echo $this->Html->script(array('jquery-1.4.2.min', 'jquery.dataTables.min', 'jquery.easyui.min' , 'formValidator', 'formValidatorRegex'));
//endif;
echo $scripts_for_layout;
?>
<script type="text/javascript" charset="utf-8">
			// oSort 是排序类型数组, 'chinese-asc' 是自己定义的类型的排序(*-asc || *-desc)名称.
			// 插件应该会根据表格中的内容的类型(string, number, chinese :) )，
			// 比如: chinese类型的用 oSort['chinese-asc'] 方法进行比较排序。所以下面定义类型的时候要和这里对上。
			//用oSort对应的function 来进行比较排序.
			// 所以，function 里是自定义的比较方法.
			
			/*
		    jQuery.fn.dataTableExt.oSort['chinese-asc']  = function(x,y) {
		        //javascript 本身提供的本地化比较函数。
		        return x.localeCompare(y);
		    };
		 
		    jQuery.fn.dataTableExt.oSort['chinese-desc']  = function(x,y) {
		        return y.localeCompare(x);
		    };
		    //aTypes 是插件存放表格内容类型的数组，可以根据自己需求添加，比如 curreny类型。
		    // 下面用到的正则也是google来的，判断是否是中文字符.
		    //返回 null 则默认表格内容是 'string' 类型。
		    jQuery.fn.dataTableExt.aTypes.push(
		        function(sData) {
		            var reg =/^[\u4e00-\u9fa5]{0,}$/;
		            if(reg.test(sData)){
		                //return 'chinese';
		                return null;
		            }
		            return null;
		        }   
		    );
		    */
		
		    $(document).ready(function() {
		    	$('#example').dataTable( {
		    		"bJQueryUI": true,
		    		"bSort": false,
	    			"oLanguage": {
	    		        "sProcessing": "处理中...",
	    				"sLengthMenu": "每页显示  _MENU_ 条记录",
	    				"sZeroRecords": "暂时没有任何记录",
	    				"sSearch": "搜索:",
	    				"sInfo": "当前记录从第_START_到_END_条记录；共有_TOTAL_条记录",
	    				"sInfoEmpty": "当前记录从第0到0条记录；共有0条记录",
	    				"sInfoFiltered": "(filtered from _MAX_ total records)",
	    				"oPaginate": {
						   "sFirst":"第一页",
						   "sPrevious":"上一页",
						   "sNext":"下一页",
						   "sLast":"最后一页"
					    },
					    "fnInfoCallback": null
	    			}
		    		} );
		    	} );
 	
</script>

<script type="text/javascript" charset="utf-8">
	$(function() {
		$("#flashMessage22").dialog({
			  title:'My Dialog',
			  iconCls:'icon-ok',
			    buttons:[{
			        text:'Ok',
			        iconCls:'icon-ok',
			        handler:function(){
			            alert('ok');
			            $('#flashMessage').dialog('close');
			        }
			    },{
			        text:'Cancel',
			        handler:function(){
			            $('#flashMessage').dialog('close');
			        }
			    }]
			  
		});
	});
</script>

<script type="text/javascript" charset="utf-8">
	$(function() {
		if ( $('#flashMessage').text() != '') {
			$.messager.alert('信息提示',$('#flashMessage').text(),'info');
			$('#flashMessage').text("");
		}
	});
</script>


</head>
<body id="dt_example">
<div id="container">
<div id="content"><?php echo $this->Session->flash(); ?> <?php echo $content_for_layout; ?>
</div>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
