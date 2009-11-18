<?php
/*
CREATE TABLE `forums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext,
  `description` tinytext,
  `topicCount` int(11) NOT NULL DEFAULT '0',
  `postCount` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
*/
class Forum_Model extends ORM {
	protected $has_many = array(
		'forum_topics'
	);
}