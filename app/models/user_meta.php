<?php
class UserMeta extends AppModel {
	var $name = 'UserMeta';

	var $hasOne = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'ID',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);	

}
?>