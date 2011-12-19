<?php
class RecruitmentsController extends HrAppController {

	var $name = 'Recruitments';
	var $helpers = array('Html', 'Form', 'Javascript', 'Fck');

	function admin_index() {
		$this->Recruitment->recursive = 0;
		$this->set('recruitments', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Recruitment.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('recruitment', $this->Recruitment->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->data['Recruitment']['region_id'] = $this->data['Recruitment']['city'];
			$this->data['Recruitment']['publish_date'] = date("Y-m-d H:i:s");
			$this->Recruitment->create();
			if ($this->Recruitment->save($this->data)) {
				$this->Session->setFlash(__('招聘信息发布成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Recruitment could not be saved. Please, try again.', true));
			}
		}
		$positions = $this->Recruitment->Position->find('list');
		$diplomas = $this->Recruitment->Diploma->find('list');
		$skills = $this->Recruitment->Skill->find('list');
		$departments = $this->Recruitment->Department->find('list');
		$regions = $this->Recruitment->Region->find('list', array('conditions' => array('Region.id LIKE' => '__0000')));
		$regions = array('' => '--请选择--') + $regions;
		$this->set(compact('positions', 'diplomas', 'skills', 'departments', 'regions'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Recruitment', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
				
			if(!empty($this->data['Recruitment']['city']) && !empty($this->data['Recruitment']['region_id'])) {
				$this->data['Recruitment']['region_id'] = $this->data['Recruitment']['city'];
			}else{
				$this->data['Recruitment']['region_id'] = $this->data['Recruitment']['old_city'];
			}		

			if ($this->Recruitment->save($this->data)) {
				$this->Session->setFlash(__('招聘信息修改成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Recruitment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Recruitment->read(null, $id);
		}
		$positions = $this->Recruitment->Position->find('list');
		$diplomas = $this->Recruitment->Diploma->find('list');
		$skills = $this->Recruitment->Skill->find('list');
		$departments = $this->Recruitment->Department->find('list');
		$regions = $this->Recruitment->Region->find('list', array('conditions' => array('Region.id LIKE' => '__0000')));
		$regions = array('' => '--请选择--') + $regions;
		$this->set(compact('positions', 'diplomas', 'skills', 'departments', 'regions'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Recruitment', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Recruitment->id = $id;
		if ($this->Recruitment->delete()) {
			$this->Session->setFlash(__('招聘信息已被删除.', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function admin_export() {
		$this->view = 'Media';

		$this->Recruitment->sql_export();

		App::import('Vendor', '/utils/file');
		$params = array(
			'id' => 'db.sql',
			'name' => 'db-'.date('Y-m-d'),
			'download' => true,
			'extension' => 'sql',
			'path' => ROOT.DS.APP_DIR.DS.'export'.DS
		);
		$this->set($params);
	}

	//前台网站对招聘信息的查看
	function view($id = null) {
		//$this->layout = 'greybox';
		if (!$id) {
			$this->Session->setFlash(__('无效招聘信息.', true));
			$this->redirect(array('controller'=>'posts', 'action'=>'recruit'));
		}
		$this->set('recruitment', $this->Recruitment->read(null, $id));
	}

}
?>