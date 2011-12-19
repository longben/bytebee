<script type="text/javascript" src="/js/app/user.js"></script>
	<table cellpadding="0" cellspacing="0"  id="user-table" width="100%">
		<thead>
			<tr>
				<th field="user_nicename" width="25%">名称</th>
				<th field="user_email" width="25%">电话</th>
				<th field="user_email" width="25%">地址</th>
				<th field="user_email" width="25%">职务</th>
			</tr>			
		</thead>
	</table>
	
	<div id="user-window" title="用户窗口" style="width:400px;height:250px;">
		<div style="padding:20px 20px 40px 80px;">
			<form method="post">
				<table>
					<tr>
						<td>名称：</td>
						<td><input name="name"></input></td>
					</tr>
					<tr>
						<td>电话：</td>
						<td><input name="phone"></input></td>
					</tr>
					<tr>
						<td>地址：</td>
						<td><input name="addr"></input></td>
					</tr>
					<tr>
						<td>职务：</td>
						<td><input name="duty"></input></td>
					</tr>
				</table>
			</form>
		</div>
		<div style="text-align:center;padding:5px;">
			<a href="javascript:void(0)" onclick="saveUser()" id="btn-save" icon="icon-save">保存</a>
			<a href="javascript:void(0)" onclick="closeWindow()" id="btn-cancel" icon="icon-cancel">取消</a>
		</div>
	</div>