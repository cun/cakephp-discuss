<?php
class DiscussTopicsController extends DiscussAppController {
	var $name = 'DiscussTopics';
	var $uses = 'Discuss.DiscussTopic';
	
	function view($id = null) {
		if(!$id) {
			exit;
		}
		
		$this->data = $this->DiscussTopic->DiscussPost->find('all', array(
			'contain' => array('User'),
		
			'conditions' => array(
				'discuss_topic_id' => $id,
				'parent_id IS NULL',
			),
			'order' => 'DiscussPost.created ASC',
		));
		
		$topic = $this->DiscussTopic->find('first', array(
			'contain' => array(),
			
			'conditions' => array(
				'id' => $id,
			),
		));
		
		$this->set('topicId', $id);
		$this->set('topic', $topic['DiscussTopic']['name']);
	}
}
?>