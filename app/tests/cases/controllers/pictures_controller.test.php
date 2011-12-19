<?php
/* Pictures Test cases generated on: 2010-12-28 20:12:02 : 1293540002*/
App::import('Controller', 'Pictures');

class TestPicturesController extends PicturesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PicturesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.picture', 'app.picture_type');

	function startTest() {
		$this->Pictures =& new TestPicturesController();
		$this->Pictures->constructClasses();
	}

	function endTest() {
		unset($this->Pictures);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>