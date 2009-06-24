<?php
class DiscussTopicsController extends DiscussAppController {
	var $name = 'DiscussTopics';
	var $uses = 'Discuss.DiscussTopic';
	
	function view($id = null) {
		if(!$id) {
			$this->Session->setFlash('Invalid Topic!');
			$this->redirect('/discuss/discuss_categories');
		}
		
		$this->data = $this->DiscussTopic->DiscussPost->find('all', array(
			'contain' => array('User'),
		
			'conditions' => array(
				'discuss_topic_id' => $id,
				'parent_id IS NULL',
			),
			'order' => 'DiscussPost.created DESC',
		));
		
		// @TODO: Replace this count code with counterCache
		foreach ($this->data as $key => $post) {
			$this->data[$key]['DiscussPost']['discuss_post_count'] = $this->DiscussTopic->DiscussPost->find('count', array(
				'conditions' => array(
					'DiscussPost.parent_id' => $post['DiscussPost']['id'],
				),
			));
		}
		
		$latestPosts = array();
		foreach ($this->data as $key => $post) {
			$latestPosts[$post['DiscussPost']['id']] = $this->DiscussTopic->DiscussPost->find('first', array(
					'contain' => array(
						'Parent',
						'User',
					),
					'conditions' => array(
						'DiscussPost.parent_id' => $post['DiscussPost']['id'],
					),
					'order' => 'DiscussPost.created DESC',			
			));
			
			if (empty($latestPosts[$post['DiscussPost']['id']]['DiscussPost']['parent_id'])) {
				$latestPosts[$post['DiscussPost']['id']]['Parent'] = $latestPosts[$post['DiscussPost']['id']]['DiscussPost'];
			} else if (!empty($latestPosts[$post['DiscussPost']['id']]['DiscussPost']['parent_id'])) {
				$latestPosts[$post['DiscussPost']['id']]['Parent']['title'] = '[Reply] ' . $latestPosts[$post['DiscussPost']['id']]['Parent']['title'];
			}
		}
		
		$topic = $this->DiscussTopic->find('first', array(
			'contain' => array(),
			
			'conditions' => array(
				'id' => $id,
			),
		));
		
		$this->set('topicId', $id);
		$this->set('topic', $topic['DiscussTopic']['name']);
		$this->set(compact('latestPosts'));
	}
}
?>