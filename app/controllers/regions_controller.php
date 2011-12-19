<?php
class RegionsController extends AppController {

	var $name = 'Regions';


	function index() {
		$this->Region->recursive = 0;
		$this->set('regions', $this->paginate());
	}

	function city(){
		$this->RequestHandler->isXml();
		$params = array(
			'conditions' => array('Region.id like' => substr($this->data['Department']['region_id'],0,2).'____', 'Region.id <> ' => $this->data['Department']['region_id'])
		);
		$this->set('citys', $this->Region->find('all', $params));
	}

	function resume_city(){
		$this->RequestHandler->isXml();
		$this->RequestHandler->setContent('json', 'text/x-json', 'xml');
		$params = array(
			'conditions' => array('Region.id like' => substr($this->data['Department']['region_id'],0,2).'____', 'Region.id <> ' => $this->data['Department']['region_id'])
		);
		$this->set('resume_citys', $this->Region->find('all', $params));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Region.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('region', $this->Region->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Region->create();
			if ($this->Region->save($this->data)) {
				$this->Session->setFlash(__('The Region has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Region could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Region', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Region->save($this->data)) {
				$this->Session->setFlash(__('The Region has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Region could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Region->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Region', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Region->del($id)) {
			$this->Session->setFlash(__('Region deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>