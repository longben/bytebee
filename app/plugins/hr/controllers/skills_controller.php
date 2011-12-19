<?php
class SkillsController extends HrAppController {

	var $name = 'Skills';
	var $helpers = array('Html', 'Form', 'Javascript');

	function admin_index() {
		$this->Skill->recursive = 0;
		$this->set('skills', $this->paginate());
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Skill->create();
			if ($this->Skill->save($this->data)) {
				$this->Session->setFlash(__('职能保存成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Skill could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Skill', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Skill->save($this->data)) {
				$this->Session->setFlash(__('职能保存成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Skill could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Skill->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Skill', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Skill->del($id)) {
			$this->Session->setFlash(__('职能删除成功！', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>