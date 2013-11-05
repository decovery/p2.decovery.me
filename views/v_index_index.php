<?php if(!$user): ?>

	<h1>Welcome to <?=APP_NAME?></h1>

	<?= $signup ?>
	<br/>
	or
	<br/>
        <!-- Display the login module -->
	<?=$login?>

<?php else: ?>

	<h1>Welcome to <?=APP_NAME?><?= ', '.$user->first_name; ?></h1>
	
	


<?php endif; ?>