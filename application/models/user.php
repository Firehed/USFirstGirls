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
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` char(50) NOT NULL,
  `logins` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_login` int(10) UNSIGNED,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_username` (`username`),
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
	
	// No deleting users.
	public function delete() {
		return false;
	} // function delete
	
	public function getName() {
		return $this->username;
	} // function getName
	
/*
	public function can($action, RoleEnforcer $enforcer) {
		return permissions::can($this, $action, $enforcer);
	} // function can
*/




	public function setEmail($email) {
		if (!valid::email($email)) {
			throw new ValidationException('models.user.email.invalid');
		}
		elseif (ORM::factory('user', $email)->loaded) {
			throw new ValidationException('models.user.email.inuse');
		}
		return strtolower($email);
	} // function setEmail
	
	public function setPassword($password) {
		if (!preg_match('/(?=.*[a-zA-Z])(?=.*[0-9]).{6,}/', $password)) {
			throw new ValidationException('models.user.password.invalid');
		}

		// Moved from the original Auth_User_Model
		return Auth::instance()->hash_password($password);
	} // function setPassword

	public function setUsername($username) {
		if (!$username) {
			throw new ValidationException('models.user.username.blank');
		}
		if (ORM::factory('user', $username)->loaded) {
			throw new ValidationException('models.user.username.inuse');
		}
		return $username;
	} // function setUsername

	public function unique_key($id) {
		if ( ! empty($id) AND is_string($id) AND ! ctype_digit($id)) {
			return valid::email($id) ? 'email' : 'username';
		}
		return parent::unique_key($id);
	} // function unique_key

} // class User Model
