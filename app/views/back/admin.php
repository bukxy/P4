<?php ob_start(); ?>

<?php
session_start();
if (isset($_SESSION['pseudo'])) {?>

	<p>hello <?= $_SESSION['pseudo'] ?></p>
	<?php $title = 'Gestion des articles'; ?>
	<?php $titleCat = 'Gestion des articles'; ?>

	<a href="index.php?p=newPost"><input name="ButtonAddPost" value="Nouvel article" type="button" /></a>

		<?php foreach ($posts as $post): ?>

			<div>
				<h3> <?= htmlspecialchars($post->getTitle()); ?> </h3>
				<p>
					<em>le <?= $post->getDate();?></em> par <?= $post->getAuthor(); ?>
				</p>
					
				<p>
					<?= strip_tags(substr(($post->getPost()), 0, 200)); ?>
				</p>
			</div>
			<div>
				<a href="index.php?p=deletePost&amp;id=<?= $post->getId() ?>"><input name="ButtonDeletePost" id="deletePostJS" value="Supprimer l'article" type="submit" /></a>
				<a href="index.php?p=editPost&amp;id=<?= $post->getId() ?>"><input name="ButtonEditPost" value="Modifier l'article" type="submit" /></a>
			</div>

		<?php endforeach;

} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>