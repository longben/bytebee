<?php
	foreach($members as $i => $member) {
		if ($i == 0) {
			$header = array();
			foreach($member['Member'] as $field => $value) {
				$header[] .= $field;
			}
			
			$excel->addRow($header);
		}
		$excel->addRow($member['Member']);
	}

	$file = 'Member-'.date('Y-m-d');
	$excel->render($file); 
?>