<?php
/*
CREATE TABLE `forum_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forum_topic_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `body` text,
  `timeCreated` int(11) DEFAULT NULL,
  `timeEdited` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `forum_topic_id` (`forum_topic_id`),
  CONSTRAINT `forum_posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `forum_posts_ibfk_3` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
*/

class Forum_Post_Model extends ORM {
	protected $belongs_to = array(
		'forum_topic',
		'user'
	);
	public function delete() {
		$topic = $this->forum_topic;
		
		if ($topic->firstPost_id == $this->id) {
			// The FKs in the DB will delete the post for us
			// This helps keep the denormalized data (post counts, etc) accurate
			return $topic->delete(true);
		}
		
		// Stops forum_topics.lastPost_id FK nuking that column
		if ($topic->lastPost_id == $this->id) {
			$topic->lastPost_id = $topic->forum_posts[count($topic->forum_posts) - 2]->id; // Second to last post
		}

		$topic->postCount --;
		$topic->save();
		
		$topic->forum->postCount --;
		$topic->forum->save();

		return parent::delete();
	} // function delete

	public function getTimeCreatedW3C() {
		return date(DateTime::W3C, $this->object['timeCreated']);
	} // function getTimeCreatedW3C

	public function save() {
		$new = !$this->loaded; // Save this since it's changed by ORM::save()
		$this->timeEdited = time();
		
		if ($new) {
			$this->timeCreated = time();
		}
		if (parent::save()) {
			if ($new) { // New posts only
				
				$this->forum_topic->postCount ++;
				$this->forum_topic->lastPost_id = $this->id;
				// Assume that if the topic doesn't have a first post set yet, this is it.
				if (!$this->forum_topic->firstPost_id) {
					$this->forum_topic->firstPost_id = $this->id;
				}
				$this->forum_topic->save();
			
				$this->forum_topic->forum->postCount ++;
				$this->forum_topic->forum->save();
			}
			return $this;
		}
		else {
			return false;
		}
	} // function save
	
	public function setBody($body) {
		$body = trim($body);
		if (!$body) {
			throw new ValidationException('models.forum_post.body.empty');
		}
		return $body;
	} // function setBody

} // class Forum_Post_Model