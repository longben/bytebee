<?php
class UsersController extends AppController {

	var $name = 'Users';

	public function beforeFilter() {
        parent::beforeFilter();

		if ($this->RequestHandler->ext === 'json') {
			$this->RequestHandler->setContent('json');
		}

        $this->Auth->fields = array(
            'username' => 'user_login',
            'password' => 'user_pass',
            'status'   => 'user_status'
        );

        $this->Auth->allow('*');

	}

    public function add() {
        if (!empty($this->data)) {
            $this->User->create();
            if ($this->User->save($this->data)) {
                $this->Session->setFlash('User created!');
                $this->redirect(array('action'=>'login'));
            } else {
                $this->Session->setFlash('Please correct the errors');
            }
        }
    }

    function captcha(){
        $this->Captcha->render();
    }

    function login(){
        $this->layout = 'blank';
        if(!empty($this->data) && !empty($this->Auth->data['User']['user_login']) && !empty($this->Auth->data['User']['user_pass'])){
            if($this->Auth->login()){
                if(isset($this->data['User']['captcha']) && $this->Session->read('captcha')!=$this->data['User']['captcha']){
                    $this->Session->setFlash(__('输入的验证码不正确', true));
                    $this->redirect($this->referer());
                }else{
                    $this->Session->write('role', $this->data['User']['role']);
                    $this->redirect($this->Auth->redirect());
                }
            }
        }
    }

    function logout(){
        $this->Session->setFlash("You've successfully logged out.");
        $this->redirect($this->Auth->logout()); 
    }

	function login_bak(){
		$this->User->recursive = 0;

		if(isset($this->data['User']['captcha']) && $this->Session->read('captcha')!=$this->data['User']['captcha']){
			$this->Session->setFlash(__('输入的验证码不正确', true));
			$this->redirect('/login');
		}else{
			list($uid, $username, $password, $email, $user)= $this->User->login($this->data['User']['login_name'],$this->data['User']['password']);

			if($uid > 0){
				$this->Session->destroy();
				$this->Session->write('id', $uid);
				$this->Session->write('User', $user);
				$this->Session->write('role', $user['Meta']['role_id']);

				$this->Session->write('IsAuthorized', 1);

				$this->redirect('/admin/platforms/');
			} elseif($uid == -1) {
				$this->Session->setFlash(__('用户不存在,或者被删除', true));
				$this->redirect('/login');
			} elseif($uid == -2) {
				$this->Session->setFlash(__('用户名或者密码错', true));
				$this->redirect('/login');
			} else {
				$this->Session->setFlash(__('未定义', true));
				$this->redirect('/login');
			}
		}
	}

	function admin_list() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
		if (!$this->RequestHandler->isAjax()) {
			$this->layout = 'default';
		}
	}

	function admin_index() {
		$this->User->recursive = 0;
		$this->paginate = array(
          'conditions' => array('User.ID !=' => '1')
		);
		$this->set('users', $this->paginate());
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->User->Member->save($this->data);
				$this->User->Meta->save($this->data);
				$this->Session->setFlash(__('用户资料更新成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Meta->Role->find('list');
		$this->set(compact('roles'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->User->id = $id;
		if ($this->User->delete()) {
			$this->Session->setFlash(__('用户已被删除！', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
