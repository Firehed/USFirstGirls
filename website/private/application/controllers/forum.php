<?php
class Forum_Controller extends Template_Controller {

	const topicsPerPage = 15;
	const postsPerPage  = 15;
	
	private function _getOffset($total) {
		return $total * ($this->input->get('page', 1) - 1);
	} // function _getOffset

	public function index() {
		$forums = ORM::factory('forum')->find_all();
		$this->tpl->forums = $forums;
	} // function index
	
	public function newTopic($forumId = null) {
		$forum = ORM::factory('forum', $forumId);
		if (!$this->user) {
			$this->error('forum.newTopic');
			url::redirect(request::referrer());
		}
		if (form::valid()) {
			$topic = new Forum_Topic_Model;
			$topic->forum_id = $forum->id;
			$topic->title    = $this->input->post('title');
			$topic->user_id  = $this->user->id;
			if ($topic->save()) {
				$post = new Forum_Post_Model;
				$post->forum_topic_id = $topic->id;
				$post->body           = $this->input->post('body');
				$post->user_id        = $this->user->id;
				if ($post->save()) {
					$this->message('forum.newTopic');
					url::redirect('forum/topic/' . $topic->id);
				}
				else {
					$this->error($post->exceptions);
					$topic->delete();
				}
			}
			else {
				$this->error($topic->exceptions);
			}
		}
		$this->titleValues = array($forum->name);
	} // function newTopic
	
	protected function reply($topicId) {
		if (!$this->user) {
			$this->error('forum.reply');
			return;
		}
		$post = new Forum_Post_Model;
		$post->user_id        = $this->user->id;
		$post->body           = $this->input->post('body');
		$post->forum_topic_id = $topicId;
		if ($post->save()) {
			$this->message('topic.reply');
		}
		else {
			$this->error($post->exceptions);
		}
	} // function reply
	
	public function subscribe($topicId) {
		if (!$this->user) {
			$this->error('errors.topic.subscribe');
			url::redirect('signin');
		}
		$topic = ORM::factory('forum_topic', $topicId);
		$topic->add($this->user);
		$topic->save();
		$this->message('topic.subscribed');
		url::redirect(request::referrer());
	} // function subscribe
	
	public function unsubscribe($topicId) {
		if (!$this->user) {
			$this->error('errors.topic.unsubscribe');
			url::redirect('signin');
		}
		$topic = ORM::factory('forum_topic', $topicId);
		$topic->remove($this->user);
		$topic->save();
		$this->message('topic.unsubscribed');
		url::redirect(request::referrer());
	} // function unsubscribe
	
	public function topic($topicId = null) {
		$topic = ORM::factory('forum_topic', $topicId);
		
		if (!$topic->loaded) {
			throw new Kohana_404_Exception;
		}
		
		if (form::valid()) {
			$this->reply($topicId);
		}
		
		$this->tpl->topic = $topic;
		
		$this->tpl->posts = ORM::factory('forum_post')
			->where('forum_topic_id', $topicId)
			->limit(self::postsPerPage, $this->_getOffset(self::postsPerPage))
			->orderby('timeCreated', 'asc')
			->find_all();
			
		$this->tpl->pagination = new Pagination(array(
			'total_items'    => ORM::factory('forum_post')->where('forum_topic_id', $topicId)->count_all(),
			'items_per_page' => self::postsPerPage,
		));
		
		
		$this->titleValues = array($topic->title);
	} // function topic
	
	public function view($forumId = null) {
		$forum = ORM::factory('forum', $forumId);
		
		if (!$forum->loaded) {
			throw new Kohana_404_Exception;
		}
		$this->tpl->forum = $forum;
		$this->tpl->pagination = new Pagination(array(
			'total_items'    => ORM::factory('forum_topic')->where('forum_id', $forumId)->count_all(),
			'items_per_page' => self::topicsPerPage,
		));
		
		$this->tpl->topics = ORM::factory('forum_topic')
			->where('forum_id', $forumId)
			->limit(self::topicsPerPage, $this->_getOffset(self::topicsPerPage))
			->orderby('lastActivityTime', 'desc')
			->find_all();
		
		$this->titleValues = array($forum->name);
	} // function view
	
}