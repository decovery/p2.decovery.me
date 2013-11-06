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
	
		# Load client files
		# Head
		$client_files_head = array(
				'/css/profile.css',
				'/js/profile.js'
				);
			
		$this->template->client_files_head = Utils::load_client_files($client_files_head);
		
		# Body
		$client_files_body = array(
				'/js/profile.js'
				);
			
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
						     		
		# Render the view
		echo $this->template;      					     		

	} # End of method
	
	
} # End of class
