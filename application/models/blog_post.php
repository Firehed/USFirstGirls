<?php
/*
CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `summary` tinytext,
  `body` text,
  `title` tinytext,
  `timeCreated` int(11) DEFAULT NULL,
  `timeEdited` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
*/
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