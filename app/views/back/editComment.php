<?php 
session_start();
ob_start(); 

if (isset($_SESSION['pseudo'])) { ?>

    <?php $title = 'Modification du commentaire'; ?>
    <?php $titleCat = 'Modification du commentaire'; ?>

    <form action="index.php?p=updateComment&amp;id=<?= $comment->getId() ?>" method="post">

        <a href='index.php?p=comments'><input name="Button" value="Annuler" type="button" /></a>

        <input name="id" value="<?= $comment->getId() ?>" type="hidden" />
        <a href="index.php?p=updateComment&amp;id=<?= $comment->getId() ?>"><input name="edit" value="Sauvegarder les modifications" type="submit" /></a>
        
        <br /><br />
        <p>
            Date du commentaire : <em>le <?= $comment->getDate();?></em> par <?= $comment->getAuthor(); ?>
        </p>

        <p>Contenu du commentaire :</p>
        <textarea type="text" name="comment" id="tinyMCE" id="PostContent" required>
            <?= htmlspecialchars($comment->getComment())?>
        </textarea>

    </form>

<?php
} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>