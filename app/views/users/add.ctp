<?php
echo $this->Form->create();
echo $this->Form->inputs(array(
  'legend' => 'Signup',
  'user_login',
  'user_pass'
));
echo $this->Form->end('Submit');
?>  