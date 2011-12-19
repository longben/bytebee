<?php
class DiplomasController extends HrAppController {

	var $name = 'Diplomas';
	var $helpers = array('Html', 'Form', 'Javascript');

	function admin_index() {
		$this->Diploma->recursive = 0;
		$this->set('diplomas', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Diploma.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('diploma', $this->Diploma->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Diploma->create();
			if ($this->Diploma->save($this->data)) {
				$this->Session->setFlash(__('学历保存成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Diploma could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Diploma', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Diploma->save($this->data)) {
				$this->Session->setFlash(__('学历保存成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Diploma could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Diploma->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Diploma', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Diploma->del($id)) {
			$this->Session->setFlash(__('学历删除成功！', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>