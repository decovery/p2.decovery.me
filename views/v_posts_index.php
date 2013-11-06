<!--Display posts from followed users-->
<?php foreach ($posts as $post): ?>

<article class="post">

	<h2><?= $post['first_name'] ?> <?= $post['last_name'] ?> posted:</h2>
	<i><time datetime="<?= Time::display($post['created'], 'Y-m-d G:i') ?>">
		<?= Time::display($post['created']) ?>
	</time></i>
	<p><?= $post['content'] ?></p>
	
</article>

<?php endforeach; ?>

<?php if($posts == NULL): ?>
	<i>No posts to display.</i>
<?php endif; ?>