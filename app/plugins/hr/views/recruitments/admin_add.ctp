<?php
  echo $fck->load();
?>
<script type="text/javascript">
var targetSelect;

function showCity(proId,targetSel,http){
    var sendData = "data[Post][regions]=" + proId;
  
    targetSelect = targetSel;
   
    $.ajax({
       type: "POST",
       url: http,
       data: sendData,
       dataType: "xml",
       success: function(xml){
            removeAllOpt(targetSelect);
           
            property = $(xml).find("region");
           
            if(targetSelect.options.length >= 0) {
                targetSelect.options[0] = new Option();
                targetSelect.options[0].value = "0";
                targetSelect.options[0].text = "--请选择--";
            }
           
            if(property.length >0){//对应的省份有城市信息则显示
                for (var i=0,x=1;i<property.length;i++,x++){
					name = $("name",property[i]).text();
					value = $("id",property[i]).text();
					targetSelect.options[x] = new Option();
					targetSelect.options[x].value = value;
					targetSelect.options[x].text = name;
                }
            }
        }
    });
}

function removeAllOpt(sel) {
    var arr = sel.options;     
    for(var i=0; i<arr.length; i++) {
　　　　　　sel.remove(i);
    }
}

$(function() {
	$('#RecruitmentBeginDate').datebox({  
	  formatter: function(date){ return date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate(); },  
	  parser: function(date){ return new Date(Date.parse(date.replace(/-/g,"/"))); }  
	}); 
	
	$('#RecruitmentEndDate').datebox({  
	  formatter: function(date){ return date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate(); },  
	  parser: function(date){ return new Date(Date.parse(date.replace(/-/g,"/"))); }  
	}); 
	
});	
</script>
<div class="recruitments form">
<?php echo $form->create('Recruitment', array('id' => 'bbForm', 'name' => 'Recruitment'));?>
	<fieldset>
 		<legend><?php __('新增招聘信息');?></legend>
	<?php
		echo $form->input('position_id');
		echo $form->input('diploma_id');
		echo $form->input('skill_id');
		echo $form->input('department_id');
		echo $form->input('region_id', array('label' => '工作地点', 'onChange' => "showCity(this.value,Recruitment.RecruitmentCity,'/regions/city.xml')"));
		echo $form->input('city', array('type' => 'select', 'label' => '请选择所属地市', 'class' => 'required', 'title' =>__('请选择所属地市', true)));
		echo $form->input('total_experience', array('type' => 'select', 'label' => '工作年限', 'options' => array('在读学生' => '在读学生', '应届毕业生' => '应届毕业生', '1年及以上' => '1年及以上', '2年及以上' => '2年及以上', '3年及以上' => '3年及以上', '5年及以上' => '5年及以上', '8年及以上' => '8年及以上', '10年及以上' => '10年及以上'), 'default' => '1年及以上'));
		echo $form->input('number', array('label' => '招聘人数', 'class' => 'required alphanumeric',  'title' =>__('请输入招聘人数', true), 'class'));
		echo $form->input('email', array('class' => 'required email', 'title' =>__('请输入正确格式的电子邮箱', true), 'value' => 'hr.bsacn@bayerhealthcare.com'));		
		echo $form->input('description', array('type' => 'textarea'));
		echo $fck->editor('RecruitmentDescription', array('class' => 'required', 'title' =>__('请输入描述信息', true)));
		echo $form->input('begin_date', array('type'=>'text', 'class'=>'easyui-datebox'));
		echo $form->input('end_date',   array('type'=>'text', 'class'=>'easyui-datebox'));
		echo $form->end('确定');
	?>
	</fieldset>
</div>