<?php ob_start(); 

session_start();
if (isset($_SESSION['pseudo'])) { ?>

    <?php $title = 'Mon compte'; ?>
    <?php $titleCat = 'Mon compte'; ?>

    <form action="index.php?p=updateUser&amp;id=<?= $user->getId() ?>" method="post">

        <a href="index.php?p=updateUser&amp;id=<?= $user->getId() ?>"><input name="edit" value="Sauvegarder les modifications" type="submit" /></a>

        <label for="pseudo">Mon pseudo :</label>
        <input type="text" name="pseudo" placeholder="pseudo" class="editInput" value="<?= htmlspecialchars($user->getPseudo()); ?>" required>

		<label for="email">Mon email :</label>
        <input type="text" name="email" placeholder="email" class="editInput" value="<?= htmlspecialchars($user->getEmail()); ?>" required>

    </form>

<?php
} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>