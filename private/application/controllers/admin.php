<?php
class Admin_Controller extends Template_Controller {
	
	const blogPostsPerPage = 10;
	
	protected $requiresLogin = true;
	
	// Permissions for the pages
	protected static $actions = array(
		'blog'        => array('admin','blogger'),
		'blogs'       => array('admin','blogger'),
		'emailList'   => array('admin'),
		'fileDelete'  => array('admin'),
		'files'       => array('admin'),
		'forums'      => array('admin'),
		'index'       => array('admin','blogger'),
		'newBlogPost' => array('admin','blogger'),
		'upload'      => array('admin'),
		'user'        => array('admin'),
		'users'       => array('admin'),
	);

	// Sidebar is populated with these
	public $pages = array('index', 'blogs', 'newBlogPost','forums', 'users', 'files', 'upload', 'emailList'); 
	
	public function __construct() {
		parent::__construct();
		if (!$this->user) {
			throw new Kohana_404_Exception;
		}
		else {
			$this->userRoles = $this->user->roles->select_list();
		}

		// Basic permission-checking: a user must have at least one of the roles
		// in self::$actions[Router::$method] to access the page.
		if (!$this->_allowed(Router::$method)) {
			throw new Kohana_404_Exception;
		}
	} // function __construct
	
	public function _allowed($action) {
		return (bool) array_intersect($this->userRoles, self::$actions[$action]);
	} // function _allowed
	
	private function _getOffset($total) {
		return $total * ($this->input->get('page', 1) - 1);
	} // function _getOffset

	public function blog($postId = null) {
		$post = ORM::factory('blog_post', $postId);
		
		if (form::valid()) {
			$post->title     = $this->input->post('title');
			$post->summary   = $this->input->post('summary');
			$post->markdown  = $this->input->post('body');
			$post->body      = markdown::parse($this->input->post('body'));
			
			if ($post->save()) {
				$this->message('admin.blogpost.saved');
				url::redirect('admin/blogs');
			}
			else {
				$this->error($post->exceptions);
			}
		}
		
		
		$this->tpl->post = $post;
		$this->titleValues = array($post->title);
	} // function blog

	public function blogs() {
		
		$this->tpl->posts = ORM::factory('blog_post')
			->limit(self::blogPostsPerPage, $this->_getOffset(self::blogPostsPerPage))
			->orderby('timeCreated', 'desc')
			->find_all();
			
		$this->tpl->pagination = new Pagination(array(
			'total_items'    => ORM::factory('blog_post')->count_all(),
			'items_per_page' => self::blogPostsPerPage,
		));
		
	} // function blogs
	
	public function emailList() {
		$this->tpl->users = ORM::factory('user')->select('email')->find_all();
	} // function emailList
	
	public function fileDelete($fileId = null) {
		$file = ORM::factory('file', $fileId);
		
		if (form::valid()) {
			$file->delete();
			$this->message('admin.file.deleted');
			url::redirect('admin/files');
		}
		$this->tpl->file = $file;
	} // function fileDelete

	public function files() {
		$this->tpl->files = ORM::factory('file')
		   ->select('id', 'name', 'size')
		   ->find_all();
	} // function files
	
	public function forums() {
		if (form::valid()) {
			$forum = new Forum_Model;
			$forum->name = $this->input->post('name');
			$forum->description = $this->input->post('description');
			if ($forum->save()) {
				$this->message('forum.newForum');
			}
			else {
				$this->error($forum->exceptions);
			}
		}

		$this->tpl->forums = ORM::factory('forum')->find_all();
	} // function forums
	
	public function index() {
	} // function index
	
	public function newBlogPost() {
		if (form::valid()) {
			$post = new Blog_Post_Model;
			$post->title     = $this->input->post('title');
			$post->summary   = $this->input->post('summary');
			$post->markdown  = $this->input->post('body');
			$post->permalink = url::title($this->input->post('permalink'));
			$post->body      = markdown::parse($this->input->post('body'));
			$post->user_id   = $this->user->id;
			
			if ($post->save()) {
				$this->message('admin.blogpost.created');
				url::redirect('admin/blogs/');
			}
			else {
				$this->error($post->exceptions);
			}
		}
		
	} // function newBlogPost

	public function upload() {
		if (form::valid()) {
			$upload = $_FILES['file'];
			if ($upload['error'] == UPLOAD_ERR_OK AND $file = File_Model::upload($upload)) {
				$this->message('admin.file.uploaded');
				url::redirect("admin/files/#file_$file->id");
			}
			elseif ($upload['error'] == UPLOAD_ERR_NO_FILE) {
				$this->error('admin.uploadNoFile');
			}
			else {
				$this->error('admin.uploadError');
				Kohana::log('error', 'Error uploading file in admin panel, status code: ' . $upload['error']);
			}
		}
	} // function upload
	
	public function user($userId = null) {
		$user = ORM::factory('user', $userId);
		$roles = ORM::factory('role')->find_all();

		if (form::valid()) {
			foreach ($this->input->post('role') as $id => $value) {
				if ($value == 'yes') {
					$user->add(ORM::factory('role', $id));
				}
				else {
					$user->remove(ORM::factory('role',$id));
				}
			}
			if ($user->save()) {
				$this->message('messages.admin.user.updated');
			}
		}

		$this->titleValues = array($user->name);
		$this->tpl->user = $user;
		$this->tpl->roles = $roles;
	} // function user

	public function users() {
		if (form::valid()) {
			if (!$this->input->post('search')) {
				$this->error('admin.userWasBlank');
			}
			else {
				$user = ORM::factory('user', $this->input->post('search'));
				if ($user->loaded) {
					url::redirect('admin/user/' . $user->id);
				}
				else {
					$this->error('admin.userNotFound');
				}
				
			}
		}
	} // function users

} // class Admin_Controller
