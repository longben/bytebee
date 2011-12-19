<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo Configure::read('Site.title');?></title>
    <link href="/css/default.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/themes/default/easyui.css" />
    <link rel="stylesheet" type="text/css" href="/css/themes/icon.css" />
    <script type="text/javascript" src="/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="/js/jquery.easyui.min.1.2.2.js"></script>
	<script type="text/javascript" src='/js/outlook2.js'> </script>
	
    <script type="text/javascript">
	    <?php echo $outlook;?>

        //设置登录窗口
        function openPwd() {
            $('#w').window({
                title: '修改密码',
                width: 300,
                modal: true,
                shadow: true,
                closed: true,
                height: 190,
                resizable:false
            });
        }
        //关闭登录窗口
        function closePwd() {
            $('#w').window('close');
        }

        

        //修改密码
        function serverLogin() {
			var $oldpass = $('#txtOldPass');
            var $newpass = $('#txtNewPass');
            var $rePass = $('#txtRePass');
			
            if ($oldpass.val() == '') {
                msgShow('系统提示', '请输入旧密码！', 'warning');
                return false;
            }			
            if ($newpass.val() == '') {
                msgShow('系统提示', '请输入密码！', 'warning');
                return false;
            }
            if ($rePass.val() == '') {
                msgShow('系统提示', '请在一次输入密码！', 'warning');
                return false;
            }

            if ($newpass.val() != $rePass.val()) {
                msgShow('系统提示', '两次密码不一至！请重新输入', 'warning');
                return false;
            }

            $.post('/admin/members/change_pwd/' + $oldpass.val() + '/' + $newpass.val(), function(msg) {
                msgShow('系统提示', msg, 'info');
				$oldpass.val('');
                $newpass.val('');
                $rePass.val('');
                close();
            })
            
        }

        $(function() {

            openPwd();

            $('#editpass').click(function() {
                $('#w').window('open');
            });

            $('#btnEp').click(function() {
                serverLogin();
            })

			$('#btnCancel').click(function(){closePwd();})

            $('#loginOut').click(function() {
                $.messager.confirm('系统提示', '您确定要退出本次登录吗?', function(r) {

                    if (r) {
                        location.href = '/logout';
                    }
                });
            })
        });

    </script>

</head>
<body class="easyui-layout" style="overflow-y: hidden"  scroll="no">
<noscript>
<div style=" position:absolute; z-index:100000; height:2046px;top:0px;left:0px; width:100%; background:white; text-align:center;">
    <img src="/images/noscript.gif" alt='抱歉，请开启脚本支持！' />
</div></noscript>
    <div region="north" split="true" border="false" style="overflow: hidden; height: 30px;
        background: url(/images/layout-browser-hd-bg.gif) #7f99be repeat-x center 50%;
        line-height: 20px;color: #fff; font-family: Verdana, 微软雅黑,黑体">
        <span style="float:right; padding-right:20px;" class="head">欢迎 <?=$_SESSION['Auth']['User']['user_nicename']?> <a href="#" id="editpass">修改密码</a> <a href="#" id="loginOut">安全退出</a></span>
        <span style="padding-left:10px; font-size: 16px; "><img src="/images/logo.png" width="20" height="20" align="absmiddle" /> <?php echo Configure::read('Site.title');?>后台管理</span>
    </div>
    <div region="south" split="true" style="height: 30px; background: #D2E0F2; ">
        <div class="footer"><?php echo Configure::read('Site.tagline');?></div>
    </div>
    <div region="west" hide="true" split="true" title="导航菜单" style="width:180px;" id="west">
        <div id="nav" class="easyui-accordion" fit="true" border="false">
		  <!--  导航内容 -->
		</div>
    </div>
    <div id="mainPanle" region="center" style="background: #eee; overflow-y:hidden">
        <div id="tabs" class="easyui-tabs"  fit="true" border="false" >
			<div title="欢迎使用" style="padding:20px;overflow:hidden; color:#395a7b; " >
			   
				<div id="admin_main">
				  <div id="admin_main_2_1">
					<h3>我的个人信息</h3>
					<div class="bdr">
						<!--管理员基本信息-->
						<p>您好，<strong><span class="font_arial" style="color:#690"><?=$_SESSION['Auth']['User']['user_nicename']?></span></strong><br/>
						角色：<?=$this->requestAction('/admin/roles/read/'. $_SESSION['role']);?> <br/><br/>
						<p>登录时间：<?=date("Y年m月d日 H:i")?><br />
						登录ＩＰ：<?=$ip?> <br />
                        <!--登录次数：100 次-->
						</p>
					</div>
				  </div>
				  <div id="admin_main_2_2">
					<h3><span id="memo_mtime" style="float:right; padding-right:10px;"></span>我的备忘录</h3>
					<div class="bdr">
					  <textarea name="memo_data" id="memo_data" class="inputtext" style="height:140px;width:96%;margin:5px; padding:5px" onblur='$.post("/admin/memos/add", {memo_data: this.value }, function(data){$("#memo_mtime").html(data);});'><?=$memo?></textarea>
					</div>
				  </div>

				</div>			   
			   
			   
			</div>
		</div>
    </div>
    
    
    <!--修改密码窗口-->
    <div id="w" class="easyui-window" title="修改密码" collapsible="false" minimizable="false"
        maximizable="false" icon="icon-save"  style="width: 300px; height: 150px; padding: 5px;
        background: #fafafa;">
        <div class="easyui-layout" fit="true">
            <div region="center" border="false" style="padding: 10px; background: #fff; border: 1px solid #ccc;">
                <table cellpadding=3>
                    <tr>
                        <td>旧密码：</td>
                        <td><input id="txtOldPass" type="Password" class="txt01" /></td>
                    </tr>				
                    <tr>
                        <td>新密码：</td>
                        <td><input id="txtNewPass" type="Password" class="txt01" /></td>
                    </tr>
                    <tr>
                        <td>确认密码：</td>
                        <td><input id="txtRePass" type="Password" class="txt01" /></td>
                    </tr>
                </table>
            </div>
            <div region="south" border="false" style="text-align: right; height: 30px; line-height: 30px;">
                <a id="btnEp" class="easyui-linkbutton" icon="icon-ok" href="javascript:void(0)" >
                    确定</a> <a id="btnCancel" class="easyui-linkbutton" icon="icon-cancel" href="javascript:void(0)">取消</a>
            </div>
        </div>
    </div>

	<div id="mm" class="easyui-menu" style="width:150px;">
		<div id="mm-tabupdate">刷新</div>
		<div class="menu-sep"></div>
		<div id="mm-tabclose">关闭</div>
		<div id="mm-tabcloseall">全部关闭</div>
		<div id="mm-tabcloseother">除此之外全部关闭</div>
		<div class="menu-sep"></div>
		<div id="mm-tabcloseright">当前页右侧全部关闭</div>
		<div id="mm-tabcloseleft">当前页左侧全部关闭</div>
		<div class="menu-sep"></div>
		<div id="mm-exit">退出</div>
	</div>


</body>
</html>
