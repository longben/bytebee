<script type="text/javascript"> 
$(document).ready(function(){
	//$.formValidator.initConfig({onerror:function(){alert("校验没有通过，具体错误请看错误提示")}});
	$.formValidator.initConfig({autotip:false,tidymode:true,onerror:function(msg){alert(msg)}});
	$("#username").formValidator({onshow:"请输入用户名",onfocus:"用户名不能为空",oncorrect:"用户名合法"}).inputValidator({min:1,onerror:"姓名不能为空,请确认"});
	$("#email").formValidator({onshow:"请输入密码",onfocus:"密码不能为空",oncorrect:"密码合法"}).inputValidator({min:1,onerror:"邮箱不能为空,请确认"});
	$("#content").formValidator({onshow:"请输入验证码",onfocus:"验证码不能为空",oncorrect:"验证码合法"}).inputValidator({min:1,onerror:"加盟内容不能为空,请确认"});
});
</script>
<div class="outDiv">
  <div class="headFlash"><img src="/images/eojia/Investment_head.jpg" /></div>
</div>
<div class="outDiv">
  <div class="ListLeft">
    <div class="NowLink">当前位置：首页 > 招商加盟</div>
    <div class="listLeftBg">
      <div class="listLeftTop">
        <div class="listLeftBottom">
         <div class="con">
            <form name="form1" method="post" action="/guestbooks/add2" onsubmit="return $.formValidator.pageIsValid(1);">
			  <input type="hidden" name="data[Guestbook][message_type]" value="0" />
			    <table class="contactInput" width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr height="15">
                        <td width="30%"></td>
                        <td width="70%"></td>
                    </tr>
                    <tr height="28">
                        <td align="right">您的姓名：&nbsp;</td>
                        <td><input name="data[Guestbook][username]" id="username" type="text" size="50" maxlength="30" class="input" /></td>
                    </tr>
                    <tr height="28">
                        <td align="right">联系电话：&nbsp;</td>
                        <td><input name="data[Guestbook][telephone]" id="telephone" type="text" size="50" maxlength="30" class="input" /></td>
                    </tr>
                    <tr height="28">
                        <td align="right">联系地址：&nbsp;</td>
                        <td><input name="data[Guestbook][address]" id="address" type="text" size="50" maxlength="30" class="input" /></td>
                    </tr>					
					
                    <tr height="28">
                        <td align="right">电子邮箱：&nbsp;</td>
                        <td><input name="data[Guestbook][email]"  id="email" type="text" size="50" maxlength="50" class="input" /></td>
                    </tr>
                    <tr>
                        <td align="right">加盟内容：&nbsp;</td>
                        <td style="padding-top:5px;"><textarea name="data[Guestbook][content]" id="content" cols="52" rows="5" class="input"></textarea></td>
                    </tr>
                    <tr>>
                        <td></td>
                        <td style="padding: 10px 0 40px 0;">
                            <input type="submit" value=" 提 交 " class="button" />
                            &nbsp;
                            <input type="reset" value=" 重 置 " class="button" />
                        </td>
                    </tr>
                </table>
            </form>		 
		 
		 </div>
        </div>
      </div>
    </div>
  </div> 
  
  <div class="listRight">
    <div class="listLink">
      <div class="listLinktop">
        <div class="listLinkBottom">
          <div class="InvestmentLinkTitle"></div>
          <div class="rightLinks">
          <a href="/investment/superiority"><img src="/images/eojia/Right_link_logo.gif" border="0" /> 经营优势</a>
          <a href="/investment/condition"><img src="/images/eojia/Right_link_logo.gif" border="0" /> 加盟条件</a>
          <a href="/investment/join_in"><img src="/images/eojia/Right_link_logo.gif" border="0" /> 在线加盟</a>
          </div>
        </div>
      </div>
    </div>
    <div class="RightDIY"><a href="http://www.eojia.com/diy" target="_blank"></a></div>
  </div>
</div>