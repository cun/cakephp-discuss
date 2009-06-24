<?php
class DiscussPostsController extends DiscussAppController {
	var $name = 'DiscussPost';
	var $uses = 'Discuss.DiscussPost';
	
	function view($id = null) {
		if(!$id) {
			$this->Session->setFlash('Invalid Post ID');
			$this->redirect('/discuss/discuss_categories');
		}
		
		$id = (int)$id;
		if ($id == 0) {
			$this->Session->setFlash('Invalid Post ID');
			$this->redirect('/discuss/discuss_categories');
		}
		
		$this->data = $this->DiscussPost->find('first', array(
			'contain' => array(
				'User',
				'Reply' => array(
					'User',		
				),
			),
		
			'conditions' => array(
				'DiscussPost.id' => $id,
			),
			'order' => 'DiscussPost.created ASC',
		));
		
		if (empty($this->data)) {
			$this->Session->setFlash('Invalid Post ID');
			$this->redirect('/discuss/discuss_categories');
		}
	}
	
	function add() {
		if (!empty($this->data)) {
			// Prevent XSS
			$this->data['DiscussPost']['content'] = htmlentities($this->data['DiscussPost']['content']); 
			
			$this->DiscussPost->create();
			if ($this->DiscussPost->save($this->data)) {
				$this->Session->setFlash('Post added successfully');
				if (!empty($this->data['DiscussPost']['parent_id'])) {
					$this->redirect('/discuss/discuss_posts/view/' . $this->data['DiscussPost']['parent_id']);					
				} else {
					$this->redirect('/discuss/discuss_topics/view/' . $this->data['DiscussPost']['discuss_topic_id']);
				}
			} else {
				echo "Error adding post: Save Failed"; 
			}
		} else {
			echo "Error adding post: No Data provided";
		}
	}
}
?>