<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<link rel="stylesheet" href="/css/style.css" type="text/css" />
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
</head>

<body>
	<div id="wrapper">
	<div id='menu'>
	
		<a href='/'>Home</a>
	
		<!-- Menu for users who are logged in -->
		<?php if($user): ?>
		
			<a href='/posts/index'>See members' posts</a>
			<a href='/posts/users'>Follow members</a>
			<a href='/users/profile'>My Profile</a>
			<a href='/users/logout'>Logout</a>
			
		
		<!-- Menu options for users who are not logged in -->
		<?php else: ?>
		
			<a href='/users'>Our members</a>
			<a href='/users/signup'>Sign up</a>
			<a href='/users/login'>Log in</a>
		
		<?php endif; ?>
	
	</div>
	
	<br>

	<?php if(isset($content)) echo $content; ?>
	
	</div>
	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>