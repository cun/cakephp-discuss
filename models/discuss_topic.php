<?php
class DiscussTopic extends DiscussAppModel {

	var $name = 'DiscussTopic';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'DiscussForum' => array(
			'className' => 'Discuss.DiscussForum',
			'foreignKey' => 'discuss_forum_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		)
	);

	var $hasMany = array(
		'DiscussPost' => array(
			'className' => 'Discuss.DiscussPost',
			'foreignKey' => 'discuss_topic_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => true,
		)
	);

}
?>