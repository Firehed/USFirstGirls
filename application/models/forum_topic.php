<?php
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