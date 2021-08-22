<?php
/*
CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `permalink` varchar(127) DEFAULT NULL,
  `summary` tinytext,
  `body` text,
  `title` tinytext,
  `timeCreated` int(11) DEFAULT NULL,
  `timeEdited` int(11) DEFAULT NULL,
  `markdown` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permalink` (`permalink`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
*/
class Blog_Post_Model extends ORM {
	protected $belongs_to = array(
		'user'
	);

	protected $escapeOutput = false;

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
	
	public function setBody($body) {
		$body = trim($body);
		if (!$body) {
			throw new ValidationException('models.blog_post.body');
		}
		return $body;
	} // function setBody
	
	public function setPermalink($pl) {
		if (!trim($pl)) {
			throw new ValidationException('models.blog_post.permalink.blank');
		}
		if (preg_match('/[^a-z0-9-]/i', $pl)) {
			throw new ValidationException('models.blog_post.permalink.invalid');
		}
		if ($this->loaded) {
			throw new ValidationException('models.blog_post.permalink.nochange');
		}
		if (ORM::factory('blog_post', $pl)->loaded) {
			throw new ValidationException('models.blog_post.permalink.inuse');
		}
		return $pl;
	} // function setPermalink
	
	public function setSummary($summary) {
		$summary = trim($summary);
		if (!$summary) {
			throw new ValidationException('models.blog_post.summary');
		}
		return $summary;
	} // function setSummary
	
	public function setTitle($title) {
		$title = trim($title);
		if (!$title) {
			throw new ValidationException('models.blog_post.title');
		}
		return $title;
	} // function setTitle
	
	public function unique_key($id) {
		return is_numeric($id) ? parent::unique_key($id) : 'permalink';
	} // function unique_key
	
} // class Blog_Post_Model