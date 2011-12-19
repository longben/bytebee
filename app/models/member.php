<?php
class Member extends AppModel {

	var $name = 'Member';

	var $hasOne = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
	
	var $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);	
	


	function afterSave(){
		if ($user_id = $this->getLastInsertID()){

			App::import('Vendor', '/utils/class-phpass');
			$hasher = new PasswordHash(8, TRUE);

			$this->User->create();
			$data['User']['ID'] = $user_id;
			$data['User']['user_login'] = $this->data['Member']['login_name'];
			$data['User']['user_pass'] = $hasher->HashPassword($this->data['Member']['password']);
			$data['User']['user_nicename'] = $this->data['Member']['name'];
			$data['User']['user_email'] = $this->data['Member']['email'];
			$data['User']['user_registered'] = date('Y-m-d H:MM');
			$data['User']['display_name'] = $this->data['Member']['name'];
			
 			$this->User->save($data);
			
			$this->User->Meta->create();
			$data['Meta']['id'] = $user_id;
			$data['Meta']['role_id'] = $this->data['Member']['role_id']; 
			$data['Meta']['department_id'] = $this->data['Member']['department_id'];
			$data['Meta']['referer'] = $this->data['Member']['referer'];
			if(!empty($this->data['Member']['point'])){
				$data['Meta']['point'] = $this->data['Member']['point']; 
			}
			
			$this->User->Meta->save($data);			

		}
	}
	
	function beforeSave() {
	   if(!empty($this->data['Member']['login_name'])){
	       $count = $this->User->find('count', array('conditions' => array('User.user_login' => $this->data['Member']['login_name'])));
		   if( $count > 0 ){
			  return false;
		   }else{
			  return true;
		   }	   
	   }else{
	        return true;
	   }
	}

}
?>