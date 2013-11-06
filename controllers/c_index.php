<?php

class index_controller extends base_controller {
	
	public function __construct() {
		parent::__construct();
	} 
		
	public function index() {
		
		# Template with a view file
		$this->template->content = View::instance('v_index_index');
			
		# <title> tag
		$this->template->title = "BookTalk";
		
		# Pass the login module
		$this->template->content->login = View::instance('v_users_login');
		
		# Pass the signup module
		$this->template->content->signup = View::instance('v_users_signup');
						     		
		# Render the view
		echo $this->template;      					     		

	} # End of method
	
	
} # End of class
