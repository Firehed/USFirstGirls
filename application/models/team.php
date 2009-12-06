<?php
/*
CREATE TABLE `teams` (
  `number` int(11) NOT NULL DEFAULT '0',
  `recruited` int(11) DEFAULT NULL,
  `methods` text,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
*/
class Team_Model extends ORM {
	protected $has_many = array('users');
	protected $primary_key = 'number';
	
} // class Team_Model