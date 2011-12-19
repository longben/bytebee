<?php
class User extends AppModel {

	var $name = 'User';
	var $primaryKey = 'ID';
	
	var $displayField = 'user_nicename';

	var $hasOne = array(
			'Member' => array('className' => 'Member',
								'foreignKey' => 'id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Meta' => array('className' => 'UserMeta',
								'foreignKey' => 'id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
        );

    function hashPasswords($data) {
        if(isset($data['User']['user_pass'])){
            App::import('Vendor', '/utils/class-phpass');
            $hasher = new PasswordHash(8, TRUE);

            $this->recursive = 0;
            $user = $this->findByUserLogin($data['User']['user_login']);
            if($hasher->CheckPassword($data['User']['user_pass'], $user['User']['user_pass'])){ //校验用户口令
                $data['User']['user_pass'] = $user['User']['user_pass']; //口令正确的时候把数据库加密口令写入data
                $data['User']['role'] = $user['Meta']['role_id'];
                return $data;
            }
        }
        return $data;
    }
    

	function afterSave(){
/* 		if ($user_id = $this->getLastInsertID()){
			$this->Meta->create();
			$data['Meta']['id'] = $user_id;
			$data['Meta']['role_id'] = ROLE_DEFAULT; 
			$this->Meta->save($data);
		} */
	}

	public function update_password($id, $password) {
		return $this->query("update users set user_pass = '$password' where ID = $id");
	}
	

	public function login($login_name, $password, $type = 4) {

		switch($type){
			case 1: //独立用户登录
				break;
			case 2: //以UCenter用户管理为主的登录
			    App::import('Vendor', 'client/client'); //导入UCenter支持库

				//list($uid, $username, $password, $email)=uc_user_login($this->data['User']['login_name'],$this->data['User']['password']);

				return uc_user_login($login_name, $password);
				break;
			case 3: //以Discuz!用户为主的登录

			    //$user = $this->Member->findByUsername($login_name);
   			    $user = $this->findByUserLogin($login_name);

				if(empty($user)){
					return array(-1, '', '', '', '');
				}

				if(md5($password) == $user['User']['user_pass']){
					return array($user['User']['ID'], $user['User']['user_nicename'], '', $user['User']['user_email'], $user);
				}else{
					return array(-2, '', '', '', '');
				}
				
				break;
			case 4: //以Wordpress用户为主的登录

				//调用Wordpress里的用户加密算法，具体的使用方法参考wp-includes\pluggable.php
				App::import('Vendor', '/utils/class-phpass');

				//实例化PasswordHash方法
				$hasher = new PasswordHash(8, TRUE);

				$user = $this->findByUserLogin($login_name);

				if(empty($user)){
					return array(-1, '', '', '', '');
				}

				if($hasher->CheckPassword($password, $user['User']['user_pass'])){ //校验用户口令
					return array($user['User']['ID'], $user['User']['user_nicename'], '', $user['User']['user_email'], $user);
				}else{
					return array(-2, '', '', '', '');
				}
			    break;
		}
		
	}

}
?>
