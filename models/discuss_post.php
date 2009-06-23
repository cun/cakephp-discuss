<?php
class DiscussPost extends DiscussAppModel {

	var $name = 'DiscussPost';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DiscussTopic' => array(
			'className' => 'Discuss.DiscussTopic',
			'foreignKey' => 'discuss_topic_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		),		
		'Parent' => array(
			'className' => 'Discuss.DiscussPost',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		),	
	);
	
	var $hasMany = array(
		'Reply' => array(
			'className' => 'Discuss.DiscussPost',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		),
	);	

}
?>