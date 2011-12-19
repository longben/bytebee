<?php
class Channel extends HrAppModel {

	var $name = 'Channel';

	var $belongsTo = array(
			'Parent' => array('className' => 'Hr.Channel',
								'foreignKey' => 'parent_id',
								'conditions' => 'Parent.id <> Channel.id',
								'fields' => 'Channel.id, Channel.name',
								'order' => ''
			)
	);

}
?>