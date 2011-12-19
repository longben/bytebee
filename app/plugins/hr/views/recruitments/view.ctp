<style type="text/css"> 
.title {
	background:#fff;
	color: #003E87;
	font-family:'Gill Sans','lucida grande',helvetica, arial, sans-serif;
	text-align:center;
	font-size: 190%;
	margin: 0.3em 0;
	padding-top: 0.8em;
}

</style>

<table width="100%" border="0" cellspacing="5" cellpadding="1" bgcolor="white">
  <tr>
    <td colspan="2" align="center" height="50" class="title">招聘职位信息</td>
  </tr>
  <tr>
    <td width="20%" class="tdd">招聘职位</td>
    <td align="left"><?php echo $recruitment['Position']['name']; ?></td>
  </tr>
  <tr>
    <td class="tdd">职能</td>
    <td align="left"><?php echo $recruitment['Skill']['name']; ?></td>
  </tr>
  <tr>
    <td class="tdd">招聘部门</td>
    <td align="left"><?php echo $recruitment['Department']['name']; ?></td>
  </tr>
  <tr>
    <td class="tdd">工作年限</td>
    <td align="left"><?php echo $recruitment['Recruitment']['total_experience']; ?></td>
  </tr>
  <tr>
    <td class="tdd">招聘人数</td>
    <td align="left"><?php echo $recruitment['Recruitment']['number']; ?></td>
  </tr>
  <tr>
    <td class="tdd">地区</td>
    <td align="left"><?php echo $recruitment['Region']['name']; ?></td>
  </tr>
  <tr>
    <td class="tdd">发布日期</td>
    <td align="left"><?php echo $recruitment['Recruitment']['publish_date']; ?></td>
  </tr>  
  <tr>
    <td class="tdd">描述</td>
    <td align="left"><?php echo $recruitment['Recruitment']['description']; ?></td>
  </tr>

</table>
