<h1>List of Bookworm members.</h1> 
<?php if(!$user): ?>
	<p><?= "If you want to see their posts of follow them, please <a href='/users/signup'>signup</a> or <a href='/users/login'>login</a>." ?></p>
<?php endif; ?>
<?php foreach ($view_users as $user):?>
		<h2><?= $user['first_name'] ?> <?= $user['last_name'] ?></h2>
		
<?php endforeach; ?>
	