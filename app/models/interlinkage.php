<?php
class Interlinkage extends AppModel {
	var $name = 'Interlinkage';
	var $displayField = 'name';
	
	var $belongsTo  = array(
		'Type' => array('className' => 'Code','foreignKey' => 'type_id'),
	);		
}
?>