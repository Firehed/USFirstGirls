<?php
class Forum_Model extends ORM {
	protected $has_many = array(
		'forum_topics'
	);
}