<?php
class Blog_Post_Model extends ORM {
	protected $belongs_to = array(
		'user'
	);

	public function getTimeCreatedW3C() {
		return date(DateTime::W3C, $this->object['timeCreated']);
	} // function getTimeCreatedW3C
	
	public function save() {
		$this->timeEdited = time();
		if (!$this->loaded) {
			$this->timeCreated = time();
		}
		return parent::save();
	} // function save
	
} // class Blog_Post_Model