<?php
class ChannelsController extends HrAppController {

	var $name = 'Channels';
	var $helpers = array('Html', 'Form', 'Xml', 'Javascript');


	function admin_index() {
		$this->Channel->recursive = 0;
		$this->set('channels', $this->paginate());
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Channel->create();
			if ($this->Channel->save($this->data)) {
				$this->Session->setFlash(__('招聘渠道保存成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Channel could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->Channel->Parent->find('list', array('conditions' => array('Parent.parent_id' => '0')));
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Channel', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Channel->save($this->data)) {
				$this->Session->setFlash(__('招聘渠道保存成功！', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Channel could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Channel->read(null, $id);
		}
		$parents = $this->Channel->Parent->find('list', array('conditions' => array('Parent.parent_id' => '0')));
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Channel', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Channel->del($id, true)) {
			$this->Session->setFlash(__('招聘渠道删除成功！', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	//简历调用渠道小类
	function channel(){
		$this->RequestHandler->isXml();
		$params = array(
		    'conditions' => array('Channel.parent_id' => $this->data['Post']['channels'])
		);
		$this->set('channels', $this->Channel->find('all', $params));
	}

}
?>