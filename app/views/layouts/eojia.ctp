<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<title>四川复合地板_香港强化地板_宽板_仿实木地板_EO极地板厂家招商加盟-欧嘉地板</title>
<meta name="keywords" content="欧嘉地板,成都木地板,成都强化木地板,成都实木复合地板,成都地板,成都地面材料,北欧木地板,北欧强化木地板,北欧实木复合地板,北欧地板,北欧地面材料" />
<meta name="keywords" content="四川地板，四川复合地板，四川强化地板，香港地板，香港复合地板，香港强化地板，宽板，仿实木地板，EO极地板">
<meta name="description" content="欧嘉·科斯达，源自芬兰，亚洲总部在香港。公司主要业务为营林、木材产品加工、销售及贸易等多个领域，其中顶级产品为各种高级地板，全国招商加盟热线：400-678-0585 ">
<?php
echo $this->Html->meta('icon');
echo $this->Html->css(array('eojia/style', 'colorbox/theme3/colorbox'));
//if(isset($javascript)):
echo $this->Html->script(array('jquery-1.4.4.min', 'yoxview/yoxview-init', 'formValidator', 'formValidatorRegex', 'colorbox/jquery.colorbox-min'));
//endif;
echo $scripts_for_layout;
?>
<script type="text/javascript">
	$(document).ready(function(){
	
		$(".code").colorbox({
			width:"50%", height:"60%", iframe:true, overlayClose:false
		});
		
		$(".content").colorbox({
			width:"90%", height:"90%", iframe:true
		});		

	});

</script>
<meta name="Keywords" content="" />
<meta name="Description" content="" />
</head>

<body>
<div class="head">
  <div class="headCon">
    <a href="/investment/join_in"><span class="icon icon-service">&nbsp;</span>在线加盟</a>  |  
	<a href="/eojia/guestbook"><span class="icon icon-service">&nbsp;</span>客户反馈</a>  |  
	<a href="/eojia/hr"><span class="icon icon-users">&nbsp;</span>人力资源</a>  |  
	<a href="/eojia/agency"><span class="icon icon-agency">&nbsp;</span>经销商系统</a>  |  
	<a href="/eojia/video"><span class="icon icon-service">&nbsp;</span>精彩视频</a> <!-- |  
	<a href="#">简体中文</a>  |  
	<a href="#">繁体中文</a>-->
  </div>
</div>
<div class="menuOut">
  <div class="menu"><a href="/eojia">首页</a><a href="/about/intro">关于欧嘉</a><a href="/product">产品中心</a><a href="/news/201">新闻中心</a><a href="/investment/superiority">招商加盟</a><a href="/service">客服中心</a><a href="/contact/headquarters">联系我们</a><a href="/eojia/demo">案例欣赏</a><a href="/eojia/paper">欧嘉报刊</a><a href="http://www.eojia.com/bbs/" target="_blank">欧嘉论坛</a></div>
</div>

<?php echo $this->Session->flash(); ?> <?php echo $content_for_layout; ?>

<div class="outDiv">
  <div class="TongOut">
    <div class="TongTop">
      <div class="TongBottom">
        <div class="Copyright">
		版权所有：欧嘉·科斯达国际投资（芬兰）有限公司（北欧风情强化地板）   <br /> 
		电话：00852-36458129　　　传真：00852-36458092　　　服务热线：400-678-0585 <br />
		地址：香港长沙湾昌华街9号2字楼2A室　　蜀ICP备09034801号-1　　技术支持：<a href="http://www.cdjcit.com/" target="_blank">成都杰晨信息技术有限公司</a>
</div>
      </div>
    </div>
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