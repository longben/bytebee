<?php
class ModulesController extends AppController {

	var $name = 'Modules';
	var $helpers = array('Html', 'Form', 'Javascript');

	function admin_index() {
		$this->Module->recursive = 0;
		$this->paginate['Module'] = array(
		         //'conditions' => array('OR' => array('Module.type' => 'website', 'Module.type' => 'system')) , 
		         'conditions' => "Module.type = 'website' OR Module.type = 'system'" , 
				 'recursive' => -1, //int
				 'order' => 'Module.lft', //string or array defining order
				 'limit' => 15, //int
				 'page' => null //int
	   );		
	   $this->set('modules', $this->paginate());
	}
	
	function admin_index2($type) {
		$this->Module->recursive = 0;
		$this->paginate['Module'] = array(
		         'conditions' => array('Module.type' => $type) , 
				 'recursive' => -1, //int
				 'order' => 'Module.lft', //string or array defining order
				 'limit' => 15, //int
				 'page' => null //int
	   );		
	   $this->set('modules', $this->paginate());
	}	

	function admin_website() {
		$this->Module->recursive = 0;
		$this->paginate['Module'] = array(
				 'conditions' => array('Module.parent_id' => '302', 'Module.type' => 'website'), 
				 'recursive' => -1, //int
				 'fields' => array('Module.id', 'Module.name'),
				 'order' => 'Module.id', //string or array defining order
				 'limit' => 10, //int
				 'page' => null //int
	   );
		$this->set('modules', $this->paginate());
	}

	function admin_website_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Module', true));
			$this->redirect(array('action'=>'website'));
		}
		if (!empty($this->data)) {
			if ($this->Module->save($this->data)) {
				$this->Session->setFlash(__('栏目简介保存成功！', true));
				$this->redirect(array('action'=>'website'));
			} else {
				$this->Session->setFlash(__('The Module could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Module->read(null, $id);
		}
	}


	function admin_add() {
		if (!empty($this->data)) {
			$this->Module->create();
			if ($this->Module->save($this->data)) {
				$this->Session->setFlash(__('The Module has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Module could not be saved. Please, try again.', true));
			}
		}
		//$parents = $this->Module->Parent->find('list');
		$parents = $this->Module->generatetreelist(array('Module.hierarchy' => 1), null, null, '--', null);
		$parents = array('' => '无上级栏目') + $parents;
		
		$moduleImages = array('icon-account'=>'icon-account','icon-agency'=>'icon-agency','icon-download'=>'icon-download',
		                      'icon-nav'=>'icon-nav','icon-news'=>'icon-news','icon-product'=>'icon-product','icon-role'=>'icon-role',
							  'icon-service'=>'icon-service','icon-set'=>'icon-set','icon-sys'=>'icon-sys','icon-users'=>'icon-users');
		
		$types = array('system' => '系统模块', 'website' => '网站模块');
		$this->set(compact('parents', 'types', 'moduleImages'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Module', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {    
			if ($this->Module->save($this->data)) {
				$this->Session->setFlash(__('The Module has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Module could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Module->read(null, $id);
		}
		
		$parents = $this->Module->generatetreelist( null, null, null, '--', null);
		$parents = array('0' => '无上级栏目') + $parents;
		
		$types = array('system' => '系统模块', 'website' => '网站模块');
		$this->set(compact('parents', 'types'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Module', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Module->id = $id;
		if ($this->Module->delete()) {
			$this->Session->setFlash(__('Module deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function admin_tree() {
		/*
		if($this->Session->check('id') && $this->Session->read('role') == ROLE_ADMIN) {
			$this->layout='platforms';
			$this->Module->recursive = -1;
			$this->set('modules', $this->Module->find('all'));
		}else {
			$this->Session->setFlash(__('Invalid Administrator', true));
			$this->redirect(array('controller' => 'platforms', 'action' => 'login'));
		}
		*/
			$this->layout='platforms';
			$this->Module->recursive = -1;
			$this->set('modules', $this->Module->find('all'));
			
			//$this->set('outlook', $this->Module->generatetreelist( null, null, null, '', null));
	}

}
?>