<?php
class Blog_Controller extends Template_Controller {
	public function index() {
		$posts = ORM::factory('blog_post')
		->orderby('timeCreated', 'desc')
		->limit(10)
		->find_all();
		$this->tpl->posts = $posts;
		
	} // function index
	
	public function post($postId = null) {
		$post = ORM::factory('blog_post', $postId);
		$this->tpl->post = $post;
		$this->titleValues = array($post->title);
	} // function post
} // class Blog_Controller
