<?php
class Blog_Controller extends Template_Controller {
	public function index() {
		$posts = ORM::factory('blog_post')
		->orderby('timeCreated', 'desc')
		->limit(10)
		->find_all();
		$this->tpl->posts = $posts;
	  
		$this->_link('blog/feed', 'application/rss+xml', 'alternate', 'USFirstGirls Blog');
	} // function index
	
	public function post($postId = null) {
		$post = ORM::factory('blog_post', $postId);
		$this->tpl->post = $post;
		$this->titleValues = array($post->title);
		$this->_link('blog/feed', 'application/rss+xml', 'alternate', 'USFirstGirls Blog');
	} // function post
	
	public function feed() {
		$posts = ORM::factory('blog_post')
		->orderby('timeCreated', 'desc')
		->limit(10)
		->find_all();

		$items = array();

		foreach ($posts as $post) {
			$items[] = array(
		        'title'       => $post->title,
		        'link'        => url::base() . 'blog/post/' . $post->permalink,
		        'description' => $post->summary,
		        'author'      => $post->user->name,
				'pubDate'     => $post->timeCreatedW3C,
		    );
		}
		
		echo feed::create(array(), $items);
		exit;
	} // function feed
} // class Blog_Controller
