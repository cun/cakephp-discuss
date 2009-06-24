<?php
class DiscussCategoriesController extends DiscussAppController {
	var $name = 'DiscussCategories';
	var $uses = 'Discuss.DiscussCategory';
	
	function index() {
		$this->data = $this->DiscussCategory->find('all', array(
			'contain' => array('DiscussTopic'),
			'order' => 'id ASC',
		));
		
		$latestPosts = array();
		foreach ($this->data as $key => $category) {
			foreach ($category['DiscussTopic'] as $topic) {
				$latestPosts[$topic['id']] = $this->DiscussCategory->DiscussTopic->DiscussPost->find('first', array(
					'contain' => array(
						'Parent',
						'User',
					),
					'conditions' => array(
						'DiscussPost.discuss_topic_id' => $topic['id'],
					),
					'order' => 'DiscussPost.created DESC',
				));
			
				if (empty($latestPosts[$topic['id']]['DiscussPost']['parent_id'])) {
					$latestPosts[$topic['id']]['Parent'] = $latestPosts[$topic['id']]['DiscussPost'];
				} else if (!empty($latestPosts[$topic['id']]['DiscussPost']['parent_id'])) {
					$latestPosts[$topic['id']]['Parent']['title'] = '[Reply] ' . $latestPosts[$topic['id']]['Parent']['title'];
				}
			}
		}
		
		$this->set(compact('latestPosts'));
	}
}
?>