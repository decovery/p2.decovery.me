<?php
class posts_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		
		# Not logged in users can't see the posts
		if(!$this->user) {
			die("Please <a href='/users/login'>login.</a>");
		}
	}
	
	public function index() {
		
		# Setup view
		$this->template->content = View::instance('v_posts_index');
		$this->template->title = "Posts";
		
		# Build the query
		$q = 'SELECT
				posts.content,
				posts.created,
				posts.user_id AS post_user_id,
				users_users.user_id AS follower_id,
				users.first_name,
				users.last_name
			FROM posts
			INNER JOIN users_users
				ON posts.user_id = users_users.user_id_followed
			INNER JOIN users
				ON posts.user_id = users.user_id
			WHERE users_users.user_id = '.$this->user->user_id;
		
		# Run query
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass data to the view
		$this->template->content->posts = $posts;
		
		# Render view
		echo $this->template;
	}

	public function add() {
		
		# Setup view
		$this->template->content = View::instance('v_posts_add');
		$this->template->title = "New post";
		
		# Render template
		echo $this->template;
	}
	
	public function p_add() {
	
		# Associate this post with this user
		$_POST['user_id'] = $this->user->user_id;
		
		# Unix time stamp when this post was created/modified
		$_POST['created'] = Time::now();
		$_POST['modified'] = Time::now();
		
		# Insert post
		DB::instance(DB_NAME)->insert('posts', $_POST);
		
		# Feddback
		echo "Your post has been added. <a href='/posts/add'>Add another post</a>";
	}
	
	public function users() {
		
		# Setup view
		$this->template->content = View::instance('v_posts_users');
		$this->template->title = "Users";
		
		# Get all users
		$q = "SELECT * FROM users";
		
		# Store the result array in the variable $users
		$users = DB::instance(DB_NAME)->select_rows($q);
		
		# Query of what connections this user have (who are they following)
		$q = "SELECT *
			FROM users_users
			WHERE user_id = ".$this->user->user_id;
	
		# Store the results in variable $connections
		$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');
		
		# Pass data to the view
		$this->template->content->users = $users;
		$this->template->content->connections = $connections;
		
		# Render template
		echo $this->template;
	}
	
	public function follow($user_id_followed) {
		
		# Prepare the data array to be inserted
		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
		);
		
		# Insert data
		DB::instance(DB_NAME)->insert('users_users', $data);
		
		# Redirect to the users' list
		Router::redirect("/posts/users");
	}
	
	public function unfollow($user_id_followed) {
	
		# Delete the connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
		
		# Delete from database
		DB::instance(DB_NAME)->delete('users_users', $where_condition);
		
		# Redirect to users' list
		Router::redirect("/posts/users");
	}

} #eoc