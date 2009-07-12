<?php
class DiscussForum extends DiscussAppModel {

	var $name = 'DiscussForum';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'DiscussTopic' => array(
			'className' => 'Discuss.DiscussTopic',
			'foreignKey' => 'discuss_forum_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	var $actsAs = array(
		'Tree',
	);
	

}
?>