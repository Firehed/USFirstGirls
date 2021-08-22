<?php
/*
CREATE TABLE `data` (
  `name` varchar(63) NOT NULL,
  `value` tinytext NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
*/

class Data_Model extends ORM {
	protected $primary_key = 'name';
	protected $primary_val = 'value';
	protected $table_name = 'data';
	
	public function __construct($id = null) {
		parent::__construct($id);
		if (!$this->loaded) $this->name = $id;
	} // function __construct
	
	public function setTo($value) {
		$this->value = $value;
		return $this;
	} // function setTo
} // class Data_Model