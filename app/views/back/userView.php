<?php ob_start(); ?>

<?php $title = 'Mon compte'; ?>
<?php $titleCat = 'Mon compte'; ?>


	<?php foreach ($posts as $post): ?>

		<div>
			<h3> <?= htmlspecialchars($post->getTitle()); ?> </h3>
			<p>
				<em>le <?= $post->getDate();?></em> par <?= $post->getAuthor(); ?>
			</p>
				
			<p>
				<?= substr(nl2br(htmlspecialchars($post->getPost())), 0, 100); ?>
			</p>
		</div>
		<div>
			<a href="index.php?p=deletePost&amp;id=<?= $post->getId() ?>"><input name="ButtonDeletePost" value="Supprimer l'article" type="submit" /></a>
			<a href="index.php?p=editPost&amp;id=<?= $post->getId() ?>"><input name="ButtonEditPost" value="Modifier l'article" type="submit" /></a>
		</div>

	<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>