<?php
class DiscussCategoriesController extends DiscussAppController {
	var $name = 'DiscussCategories';
	var $uses = 'Discuss.DiscussCategory';
	
	function index() {
		$this->data = $this->DiscussCategory->find('all', array(
			'contain' => array('DiscussTopic'),
			'order' => 'id ASC',
		));
	}
}
?>