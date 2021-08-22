<?php
/*
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
 
INSERT INTO `roles` (`id`, `name`, `description`) VALUES(1, 'login', 'Login privileges, granted after account confirmation');
INSERT INTO `roles` (`id`, `name`, `description`) VALUES(2, 'admin', 'Administrative user, has access to everything.');
 
CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT '',
  `password` char(50) NOT NULL,
  `logins` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_login` int(10) UNSIGNED,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
 
CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
 
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
 
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

CREATE TABLE `sessions` (
  `session_id` varchar(127) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
*/
class User_Model extends ORM {
	protected $has_and_belongs_to_many = array(
		'roles', // Auth
	);
	protected $has_many = array(
		'blog_posts',
		'forum_topics',
		'forum_posts',
		'user_tokens', // Auth
	);
	
	protected $belongs_to = array(
		'team',
	);
	protected $has_one = array(
		'profile_2011',
	);
	
	protected $foreign_key = array(
		'team' => 'team_number'
	);
	
	// No deleting users.
	public function delete($id = null) {
		return false;
	} // function delete

	public function getAvatarUrl() {
		return 'http://www.gravatar.com/avatar/' . md5($this->email) . '.jpg?r=g&amp;s=50';
	} // function getAvatarHtml
	
	public function getName() {
		return $this->object['name'] ? $this->object['name'] : substr($this->email, 0, strpos($this->email, '@'));
	} // function getName
	
	public function setEmail($email) {
		if (!trim($email)) {
			throw new ValidationException('models.user.email.blank');
		}
		if (!valid::email($email)) {
			throw new ValidationException('models.user.email.invalid');
		}
		elseif (ORM::factory('user', $email)->loaded) {
			throw new ValidationException('models.user.email.inuse');
		}
		return strtolower($email);
	} // function setEmail

	public function setName($name) {
		$testUser = ORM::factory('user', $name);
		if ($testUser->loaded AND $testUser->id != $this->id) {
			throw new ValidationException('models.user.name.inuse');
		}
		return $name;
	} // function setName
	
	public function setPassword($password) {
		if (strlen($password) < 6) {
			throw new ValidationException('models.user.password.invalid');
		}

		// Moved from the original Auth_User_Model
		return Auth::instance()->hash_password($password);
	} // function setPassword
	
	public function setTeam_number($number) {
		if (!is_numeric($number)) {
			throw new ValidationException('models.user.teamNumber.invalid');
		}
		return $number;
	} // function setTeam_number

	public function unique_key($id) {
		if (valid::email($id)) {
			return 'email';
		}
		return is_numeric($id) ? parent::unique_key($id) : 'name';
	} // function unique_key

} // class User Model
