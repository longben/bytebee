<?php
class Attachment extends AppModel {
	var $name = 'Attachment';
	var $displayField = 'name';
	
	var $belongsTo  = array(
		'Type' => array('className' => 'Code','foreignKey' => 'type_id'),
	);	
}
?>