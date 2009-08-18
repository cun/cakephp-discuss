<?php
class DiscussForumsController extends DiscussAppController {

	var $name = 'DiscussForums';
	
	function index() {
		$forums = $this->DiscussForum->generatetreelist(null, null, null, '&nbsp;&nbsp;&nbsp;');
		
		$this->set(compact('forums'));
	}
	
	function view($id = null) {
		if(!$id) {
			$this->Session->setFlash('Invalid Forum!');
			$this->redirect('/discuss/discuss_forums');
		}
		$forum = $this->DiscussForum->find('first', array(
			'conditions' => array('DiscussForum.id' => $id),
			'contain' => array(
				'DiscussTopic' => array(
					'limit' => 1,
					'order' => 'DiscussPost.created DESC',
					'DiscussPost.created'
				)
			)
		));
		
		$this->set(compact('forum'));
		
		/*$latestPosts = array();
		foreach ($this->data as $key => $forum) {
			foreach ($forum['DiscussTopic'] as $topic) {
				$latestPosts[$topic['id']] = $this->DiscussForum->DiscussTopic->DiscussPost->find('first', array(
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
		
		$this->set(compact('latestPosts'));*/
	}
	
}
?>