<?php

class DiscussAppModel extends AppModel {

	function __construct($one = null, $two = null, $three = null) {
		// Ensures that all models joined with Authenticated users use the right table.
		if (isset($this->belongsTo['User'])) {
			$this->belongsTo['User'] = array('className' => $this->Auth->userModel);
		}
		if (isset($this->hasMany['User'])) {
			$this->belongsTo['User'] = array('className' => $this->Auth->userModel);
		}
		if (isset($this->hasOne['User'])) {
			$this->belongsTo['User'] = array('className' => $this->Auth->userModel);
		}
		if (isset($this->hasManyAndBelongsTo['User'])) {
			$this->belongsTo['User'] = array('className' => $this->Auth->userModel);
		}
		parent::__construct($one, $two, $three);
	}

}

?>