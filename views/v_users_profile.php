<h1>This is the profile of <?= $user->first_name ?> </h1>

Name: <?= $user->first_name ?> <?= $user->last_name ?>

<br /><br />

Joined us: <?= Time::display($user->created) ?>

<br /><br />
<p><?= $user->bio ?></p>

<img src="<?= $user->avatar ?>" alt="" />

<br /><br />

<a href='/users/upload_avatar'>Upload your photo</a>
<a href='/users/edit_profile'>Edit your profile</a>
	