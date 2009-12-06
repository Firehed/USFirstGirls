<?php
/*
CREATE TABLE `forum_topics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `firstPost_id` int(10) unsigned DEFAULT NULL,
  `lastPost_id` int(11) unsigned DEFAULT NULL,
  `postCount` int(11) NOT NULL DEFAULT '0',
  `title` tinytext,
  `lastActivityTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forum_id` (`forum_id`),
  KEY `user_id` (`user_id`),
  KEY `lastPost_id` (`lastPost_id`),
  KEY `firstPost_id` (`firstPost_id`),
  CONSTRAINT `forum_topics_ibfk_1` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `forum_topics_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `forum_topics_ibfk_3` FOREIGN KEY (`lastPost_id`) REFERENCES `forum_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `forum_topics_ibfk_4` FOREIGN KEY (`firstPost_id`) REFERENCES `forum_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
*/
class Forum_Topic_Model extends ORM {
	protected $belongs_to = array(
		'forum',
		'firstPost' => 'forum_post',
		'lastPost'  => 'forum_post',
		'user',
	);
	
	protected $has_many = array(
		'forum_posts'
	);

	public function delete($lowerPostCount = false) {
		$forum = $this->forum;
		$forum->topicCount --;
		if ($lowerPostCount) {
			$forum->postCount --;
		}
		$forum->save();

		return parent::delete();
	} // function delete
	
	public function getTimeCreatedW3C() {
		return date(DateTime::W3C, $this->object['timeCreated']);
	} // function getTimeCreatedW3C

	public function save() {
		$this->lastActivityTime = time();

		$new = !$this->loaded; // Save this since it's changed by ORM::save()
		if (parent::save()) {
			if ($new) { // New topic
				$this->forum->topicCount ++;
				$this->forum->save();
			}
			return $this;
		}
		else {
			return false;
		}
	} // function save
	
	public function setTitle($title) {
		$title = trim($title);
		if (!$title) {
			throw new ValidationException('models.forum_topic.title.empty');
		}
		return $title;
		
	} // function setTitle

} // class Forum_Topic_Model