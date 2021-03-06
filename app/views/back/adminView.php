<?php
session_start();
ob_start();

if (isset($_SESSION['pseudo'])) {

	if (isset($_SESSION['message'])) {?>
	
		<div class="notifAdmin notifAdminBlue">
			<p>
				<?= $_SESSION['message'];
				unset($_SESSION['message']); ?>
			</p>
		</div>

	<?php } elseif (isset($_SESSION['notificationAdminYes'])) {?>
		
		<div class="notifAdmin notifAdminGreen">
			<p>
				<?= $_SESSION['notificationAdminYes'];
				unset($_SESSION['notificationAdminYes']); ?>
			</p>
		</div>

	<?php } elseif (isset($_SESSION['notificationAdminNo'])) {?>
		
		<div class="notifAdmin notifAdminRed">
			<p>
				<?= $_SESSION['notificationAdminNo'];
				unset($_SESSION['notificationAdminNo']); ?>
			</p>
		</div>

	<?php } ?>

	<?php $title = 'Gestion des chapitres'; ?>
	<?php $titleCat = 'Gestion des chapitres'; ?>

	<a href="index.php?p=newPost"><input class="buttonAdminPost addPost" value="Nouveau chapitre" type="button" /></a>

		<?php foreach ($posts as $post): ?>

		<section class="adminListPosts">
			<div>
				<h3> <?= htmlspecialchars($post->getTitle()); ?> </h3>
				<p>
					<?php if ($post->getEdit_date() !== NULL) { ?>
						(édité)<em> le <?= date('d/m/Y à H:i', strtotime($post->getEdit_date()))?></em>
					<?php } else { ?>
						<em>le <?= date('d/m/Y à H:i', strtotime($post->getDate()))?></em>
					<?php } ?>

					par <?= $post->getAuthor(); ?>  
				</p>
					
				<p>
					<?= strip_tags(substr(($post->getPost()), 0, 500)); ?>
				</p>
			</div>
			<div>
				<a href="index.php?p=deletePost&amp;id=<?= $post->getId() ?>"><input class="buttonAdminPost deletePost" value="Supprimer le chapitre" type="button" /></a>
				<a href="index.php?p=editPost&amp;id=<?= $post->getId() ?>"><input class="buttonAdminPost editPost" value="Modifier le chapitre" type="submit" /></a>
			</div>
		</section>

		<?php endforeach;

} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>