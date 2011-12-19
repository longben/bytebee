<?php
class PositionsController extends HrAppController {

	var $name = 'Positions';
	var $helpers = array('Html', 'Form', 'Javascript');


	function admin_index() {
		$this->Position->recursive = 0;
		$this->set('positions', $this->paginate());
	}


	function admin_add() {
		if (!empty($this->data)) {
			$this->Position->create();
			if ($this->Position->save($this->data)) {
				$this->Session->setFlash(__('职位保存成功!', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Position could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Position', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Position->save($this->data)) {
				$this->Session->setFlash(__('职位保存成功!', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Position could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Position->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Position', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Position->del($id)) {
			$this->Session->setFlash(__('职位删除成功!', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>