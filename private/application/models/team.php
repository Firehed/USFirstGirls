<?php
/*
CREATE TABLE `teams` (
  `number` int(11) NOT NULL DEFAULT '0',
  `name` varchar(64) NOT NULL DEFAULT '',
  `recruited` tinyint(4) NOT NULL DEFAULT '0',
  `methods` text,
  `girls` tinyint(4) NOT NULL DEFAULT '0',
  `size` tinyint(4) NOT NULL DEFAULT '0',
  `location` tinytext NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
*/
class Team_Model extends ORM {
	protected $has_many = array('users');
	protected $primary_key = 'number';
	
	public function save() {
		$return = parent::save();
		// When teams change, update our denormalized data table
		$teamCount  = $this->db->query('SELECT count(*) AS count FROM teams')->current()->count;
		$addedCount = $this->db->query('SELECT sum(recruited) AS sum FROM teams')->current()->sum;
		ORM::factory('data', 'teamCount')->setTo($teamCount)->save();
		ORM::factory('data', 'addedCount')->setTo($addedCount)->save();


		return $return;
	} // function save
	
} // class Team_Model