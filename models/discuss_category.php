<?php
class DiscussCategory extends DiscussAppModel {

	var $name = 'DiscussCategory';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'DiscussTopic' => array(
			'className' => 'Discuss.DiscussTopic',
			'foreignKey' => 'discuss_category_id',
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

}
?>