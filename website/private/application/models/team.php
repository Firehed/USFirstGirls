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
		$girlCount = $this->db->query('SELECT sum(girls) AS girls FROM teams')->current()->girls;
		$studentCount = $this->db->query('SELECT sum(size) AS size FROM teams')->current()->size;
		ORM::factory('data', 'teamCount')->setTo($teamCount)->save();
		ORM::factory('data', 'addedCount')->setTo($addedCount)->save();
		ORM::factory('data', 'girlCount')->setTo($girlCount)->save();
		ORM::factory('data', 'studentCount')->setTo($studentCount)->save();

		return $return;
	} // function save
	
	public function setWebsite($url) {
		if (!trim($url)) {
			return '';
		}
		
		if (!valid::url($url)) {
			$url = 'http://' . $url;
			if (!valid::url($url)) {
				throw new ValidationException('models.team.website');
			}
		}
		
		return $url;
	} // function setWebsite
	
} // class Team_Model