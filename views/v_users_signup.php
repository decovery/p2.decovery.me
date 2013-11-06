<form method='POST' action='/users/p_signup'>

	<h2>Sign-up:</h2>

    First Name<br>
    <input type='text' name='first_name' required>
    <br><br>

    Last Name<br>
    <input type='text' name='last_name' required>
    <br><br>

    Email<br>
    <input type='text' name='email' required>
    <br><br>

    Password<br>
    <input type='password' name='password' required>
    <br><br>
    
    
    <?php if(isset($error)): ?>
    	<div class='error'>
    	All fields are required. Sign up failed.
    	</div>
    	<br>
    <?php endif; ?>
    
    <input type='submit' value='Sign up'>

</form>