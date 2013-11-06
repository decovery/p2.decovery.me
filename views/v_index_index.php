<!--If not logged in user display sign up and login forms-->
<?php if(!$user): ?>

	<h1>Welcome to <?=APP_NAME?>!</h1>

	<div id="signup-block">
		<!-- Display the signup module -->
		<?= $signup ?>
	</div>
	
	<i id="or">or</i>
	
	<div id="login-block">
        <!-- Display the login module -->
		<?=$login?>
	</div>

<!--If user logged in display welcome message-->
<?php else: ?>

	<img src="<?= $user->avatar ?>" alt="<?= $user->first_name ?>">
	<h1>Welcome to <?=APP_NAME?><?= ', '.$user->first_name ?></h1>

<?php endif; ?>