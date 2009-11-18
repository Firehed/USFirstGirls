<?php
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
