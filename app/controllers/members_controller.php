<?php
class MembersController extends AppController {

	var $name = 'Members';
	var $helpers = array('Html', 'Form', 'Javascript', 'Excel');

	function register() {
		$this->layout = 'website';
		if (!empty($this->data)) {
			$this->Member->create();
			if ($this->Member->save($this->data)) {
				$this->Session->setFlash(__('The Member has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Member could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_index() {
		$this->Member->recursive = 0;
		$this->paginate = array(
          'conditions' => array('Member.id !=' => '1')
		);
		$this->set('members', $this->paginate());
	}
	
	//人员信息维护（不含新增）
	function admin_index2() {
		$this->Member->recursive = 0;
		$this->paginate = array(
          'conditions' => array('Member.id !=' => '1')
		);
		$this->set('members', $this->paginate());
	}

	//人员信息维护（不含新增）
	function admin_index3() {
		$this->Member->recursive = 0;
		$this->paginate = array(
          'conditions' => array('Member.id !=' => '1')
		);
		$this->set('members', $this->paginate());
	}	

	function admin_audit() {
		$this->Member->recursive = 0;
		$this->paginate = array(
          'conditions' => array('Member.status' => '0')
		);
		$this->set('members', $this->paginate());
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Member->create();
			if ($this->Member->save($this->data)) {
				$this->Session->setFlash(__('会员添加成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('用户名已经存在，不能重复添加。', true));
			}
		}
		$roles = $this->Member->Role->find('list');
		$departments = $this->Member->Department->generatetreelist( null, null, null, '--', null);
		$this->set(compact('roles', 'departments'));		
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Member', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Member->save($this->data)) {
				$this->Member->User->Meta->save($this->data);
				$this->Session->setFlash(__('会员资料修改成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Member could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Member->read(null, $id);
		}
		$roles = $this->Member->Role->find('list');
		$departments = $this->Member->Department->generatetreelist( null, null, null, '--', null);
		$this->set(compact('roles', 'departments'));
	}

	function admin_edit2($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Member', true));
			$this->redirect(array('action'=>'index2'));
		}
		if (!empty($this->data)) {
			if ($this->Member->save($this->data)) {
			    $this->data['Meta']['avatar'] = $this->Session->read('uploadFile');
				$this->Member->User->Meta->save($this->data);
				$this->Session->setFlash(__('用户信息修改成功！', true));
				$this->redirect(array('action'=>'index2'));
			} else {
				$this->Session->setFlash(__('The Member could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Member->read(null, $id);
		}
	}	
	
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Member', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Member->id = $id;
		if ($this->Member->delete()) {
			$this->Session->setFlash(__('会员删除成功', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function admin_profile() {
		if (!$this->Session->check('id')) {
			$this->Session->setFlash(__('Invalid Member', true));
			$this->redirect(array('controller' => 'Platforms', 'action' => 'login'));
		}
		if (!empty($this->data)) {
			if ($this->Member->save($this->data)) {
				$this->Member->User->save($this->data);
				$this->Session->setFlash(__('会员信息设置已保存.', true));
				$this->redirect(array('action'=>'profile'));
			} else {
				$this->Session->setFlash(__('The Member could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Member->read(null, $this->Session->read('id'));
		}
	}

    //修改密码
	function admin_change_password($type = 4) {
		if (!empty($this->data)) {

			$old_password = $this->data['Member']['old_password'];
			$new_password = $this->data['Member']['new_password'];
			$flag = 0;

			/*
			App::import('Vendor', 'client/client');
 			$flag = uc_user_edit($this->Session->read('User.Member.login_name') , $this->data['Member']['old_password'] , $this->data['Member']['new_password'] , null , 0);
			*/

			//调用Wordpress里的用户加密算法，具体的使用方法参考wp-includes\pluggable.php
			App::import('Vendor', '/utils/class-phpass');

			//实例化PasswordHash方法
			$hasher = new PasswordHash(8, TRUE);

			$user = $this->Member->User->read(null, $this->Session->read('id'));

			if($old_password == $new_password) {
				$flag = 0; //新旧密码相同
			}else{
				$this->log($old_password, 'longben');
				if($hasher->CheckPassword($old_password, $user['User']['user_pass'])){
					$this->Member->User->update_password($this->Session->read('id'), $hasher->HashPassword($new_password));
					$flag = 1;
				}else{
					$flag = -1; //旧密码不正确
				}
			}

			switch($flag){
				case 1:
					$this->Session->setFlash(__('更新成功',true));
					break;
				case -1:
					$this->Session->setFlash(__('旧密码不正确',true));
					break;
				case 0:
					$this->Session->setFlash(__('新密码和旧密码相同',true));
					break;
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Member->read(null, $this->Session->read('id'));
		}
	}
	
    //修改密码
	function admin_change_pwd($old_password, $new_password) {
		$this->layout = 'ajax';
		$flag = 0;

		//调用Wordpress里的用户加密算法，具体的使用方法参考wp-includes\pluggable.php
		App::import('Vendor', '/utils/class-phpass');

		//实例化PasswordHash方法
		$hasher = new PasswordHash(8, TRUE);

		$user = $this->Member->User->read(null, $this->Session->read('id'));

		if($old_password == $new_password) {
			$flag = 0; //新旧密码相同
		}else{
			//$this->log($old_password, 'longben');
			if($hasher->CheckPassword($old_password, $user['User']['user_pass'])){
				$this->Member->User->update_password($this->Session->read('id'), $hasher->HashPassword($new_password));
				$flag = 1;
			}else{
				$flag = -1; //旧密码不正确
			}
		}

		switch($flag){
			case 1:
				$msg = '密码修改成功!';
				break;
			case -1:
				$msg = '旧密码不正确!';
				break;
			case 0:
				$msg = '新密码和旧密码相同!';
				break;
		}
		$this->set('msg', $msg);
	}
	
	
	function upload(){
	
		if(isset($_REQUEST['PHPSESSID'])) {
		   session_id($_REQUEST['PHPSESSID']);
		}
	
	    Configure::write('debug', 0);
		App::import('Vendor', '/utils/file');		
		App::import('Component', 'PImage');
		$this->PImage = new PImageComponent();
			
		$upload_path = WWW_ROOT."files/user/";
		$_tmp_filename = $_FILES['uploadFile']['name'];
		$_new_filename = md5(time().$_tmp_filename).'.'.getFileExtension($_tmp_filename);
		$uploadfile = $upload_path . $_new_filename;
		
		move_uploaded_file($_FILES['uploadFile']['tmp_name'], $uploadfile);
		
	
		$this->PImage->resizeImage('resize', $_new_filename, $upload_path, false, 640, 400, 90, false);
		
		$this->PImage->resizeImage('resizeCrop', $_new_filename, $upload_path, SMALL_IMG_PREFIX.$_new_filename, 80, 50, 90);
	
		$this->Session->write('uploadFile', $_new_filename);
		
	}
	
	//以Excel格式导出会员数据
	function admin_export() {
		$this->layout = 'blank';
		
		$this->Member->recursive = 0;
		$this->set('members', $this->Member->find('all'));
	}

}
?>