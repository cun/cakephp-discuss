<?php
class DiscussTopic extends DiscussAppModel {

	var $name = 'DiscussTopic';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'DiscussCategory' => array(
			'className' => 'Discuss.DiscussCategory',
			'foreignKey' => 'discuss_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'DiscussPost' => array(
			'className' => 'Discuss.DiscussPost',
			'foreignKey' => 'discuss_topic_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		)
	);

}
?>