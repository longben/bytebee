<?php
class Recruitment extends HrAppModel {

	var $name = 'Recruitment';

	var $belongsTo = array(
		'Position' => array(
			'className' => 'Hr.Position',
			'foreignKey' => 'position_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Diploma' => array(
			'className' => 'Hr.Diploma',
			'foreignKey' => 'diploma_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Skill' => array(
			'className' => 'Hr.Skill',
			'foreignKey' => 'skill_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Department' => array(
			'className' => 'Hr.Department',
			'foreignKey' => 'department_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Region' => array(
			'className' => 'Hr.Region',
			'foreignKey' => 'region_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	
    //列出当前数据库中的表
	function list_tables(){
		$rs = mysql_list_tables('bayer_hr');
		$tables = array();
		while ($row = mysql_fetch_row($rs)) {
			$tables[] = $row[0];
		}
		mysql_free_result($rs);
		return $tables;
	}
    

	function get_insert_sql($table, $row) {
		$sql = "INSERT INTO `{$table}` VALUES (";
		$values = array();
		foreach ($row as $value) {
			$values[] = "'" . mysql_real_escape_string($value) . "'";
		}
		$sql .= implode(', ', $values) . ");\n";
		return $sql;
	}

	function dump_table($table, $fp = null) {
		$need_close = false;
		if (is_null($fp)) {
			$fp = fopen($table . '.sql', 'w');
			$need_close = true;
		}
		fwrite($fp, "-- \n-- {$table}\n-- \n");
		$rs = mysql_query("SELECT * FROM `{$table}`");
		if(!empty($rs)){
			while ($row = mysql_fetch_row($rs)) {
				fwrite($fp, $this->get_insert_sql($table, $row));
			}
			mysql_free_result($rs);
		}
		if ($need_close) {
			fclose($fp);
		}
		fwrite($fp, "\n\n");
	}

	
	function sql_export(){
		//$tables = $this->list_tables();

		//职位、学历、职能、渠道、部门、简历、地区等数据，都要统一导出
		$tables = array('positions', 'diplomas', 'skills', 'channels', 'departments', 'resumes', 'resume_metas', 'families', 'educations', 'employment_records', 'recruitments', 'regions');
		
        $filename = ROOT.DS.APP_DIR.DS.'export'.DS.'db.sql';
		$fp = fopen($filename, 'w');
		
		//删除代码表
		//fwrite($fp, "delete from positions;\n");

		foreach ($tables as $table) {
			$this->dump_table($table, $fp);
		}
	}


	

	

}
?>