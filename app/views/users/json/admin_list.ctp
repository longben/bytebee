<?php
  $users = Set::extract($users, '{n}.User');
    
  //echo $javascript->object(array('items' => $sitems, 'identifier' => 'id', 'numRows' => $this->params['paging']['Sitem']['count'])); 
  echo $js->object(array('total' => $this->params['paging']['User']['count'], 'rows' => $users));
?>