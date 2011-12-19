<?php $javascript->link(array('dtree'), false);?>
<div id="dtree">
	<script type="text/javascript">
		<!--
		function changeCloseStatus(){
			var closeSameLevelCheckbox = document.getElementById("closeSameLevelCheckbox");
			if(closeSameLevelCheckbox.checked){
				d.config.closeSameLevel = true;
			}else{
				d.config.closeSameLevel = false;
			}
		}

		d = new dTree('d');
		d.config.target = "frameMain";
		d.config.useCheckBox=false;
		d.config.imageDir = '<?=$html->url('/img/tree')?>';
		d.reSetImagePath();
		d.config.folderLinks = false;
		d.config.closeSameLevel = false;
		d.config.check=false;//显示复选框
		d.config.mycheckboxName="data[Module][Module][]";//设置<input type='checkbox' name="ids"/>name的属性
		var isOpen;

		d.add(0,-1,'Bayer HealthCare');
		<?php
		  if (!empty($role['Module'])){
			  foreach ($role['Module'] as $module):
				  if('system'==$module['type']){
					$url = $module['url']==''?'':$module['url'];
				  }else if('website'==$module['type']){
					$url = $module['url']==''?'':$module['url'].'/'.$module['id'];
				  }else{
					$url = $module['url']==''?'':$html->url($module['url']);
				  }
				  echo("d.add(". $module['id']. ",". $module['parent_id'] . ",'" . $module['name'] . "','" . $url . "');\n");
			  endforeach;
		  }
		?>
		document.write(d);
		//d.openAll();
		//-->
	</script>
</div>