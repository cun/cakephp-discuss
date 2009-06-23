<?php

class DiscussAppController extends AppController {
	var $uses = array('Containable');
	
	function beforeFilter() {
		//$this->Auth->allow('*');
		$this->Auth->loginAction = array('plugin' => null, 'controller' => 'users', 'action' => 'login');
		
		$this->layout = 'discuss-default';
	}
}

?>