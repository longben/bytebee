<script type="text/javascript">
var targetSelect;

function showCity(proId,targetSel,http){
    var sendData = "data[Department][region_id]=" + proId;
  
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
</script>

<div class="departments form">
<?php echo $this->Form->create('Department', array('id' => 'bbForm'));?>
	<fieldset>
 		<legend><?php __('Admin Edit Department'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',  array('class' => 'required'));
		echo $this->Form->input('parent_id');
		echo $this->Form->input('region_id', array('onChange' => "showCity(this.value,bbForm.DepartmentCityId,'/regions/city.xml')"));
		echo $this->Form->input('city_id');
		echo $this->Form->input('address');
		echo $this->Form->input('postcode');
		echo $this->Form->input('telephone');
		echo $this->Form->input('hotline');
		echo $this->Form->input('fax');
		echo $this->Form->input('website');
		echo $this->Form->input('email');
		echo $this->Form->input('linkman');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Department.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Department.id'))); ?></li>
		<li><?php echo $this->Html->link(__('返回部门列表', true), array('action' => 'index'));?></li>
	</ul>
</div>