<?php
class SysLogsController extends AppController {

	var $name = 'SysLogs';


	function admin_index() {
		$this->SysLog->recursive = 0;
		$this->set('sysLogs', $this->paginate());
	}
}
?>