<?php
class DiscussTopicsController extends DiscussAppController {
	var $name = 'DiscussTopics';
	
	function view($id = null) {
		if(!$id) {
			$this->Session->setFlash('Invalid Topic!');
			$this->redirect('/discuss/discuss_forums');
		}
		
		$topic = $this->DiscussTopic->find('first', array(
			'contain' => array(
				'DiscussPost' => array('User'),
			),
			'conditions' => array(
				'DiscussTopic.id' => $id,
			),
		));

		$this->set(compact('topic'));
	}
}
?>