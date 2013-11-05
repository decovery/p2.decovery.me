<h1>Upload avatar of <?= $user->first_name ?> </h1>
<br><br>

<form method='POST' enctype="multipart/form-data" action='/users/p_upload_avatar/'>
	
		<input type='file' name='avatar'>
		<input type='submit'>

</form>
<br /><br />