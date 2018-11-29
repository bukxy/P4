<?php 
session_start();
ob_start(); 

if (isset($_SESSION['pseudo'])) { ?>

    <?php $title = 'Modification du commentaire'; ?>
    <?php $titleCat = 'Modification du commentaire'; ?>

    <section class="myNewPost">

        <form action="index.php?p=updateComment&amp;id=<?= $comment->getId() ?>" method="post">

            <a href='index.php?p=comments'><input class="buttonAdminPost cancel" name="Button" value="Annuler" type="button" /></a>

            <input name="id" value="<?= $comment->getId() ?>" type="hidden" />
            <a href="index.php?p=updateComment&amp;id=<?= $comment->getId() ?>"><input class="buttonAdminPost saveEdit" name="edit" value="Sauvegarder les modifications" type="submit" /></a>

            <div class="date">

                <p>
                    Commentaire du <em><?= date('d/m/Y à H:i', strtotime($comment->getDate()))?></em>
                </p>

            </div>

            <div>

                <label for="author">Auteur :</label>
                <input type="text" name="author" class="editInput" maxlength="15" value="<?= htmlspecialchars($comment->getAuthor()); ?>" required>

            </div>

            <div>

                <label for="comment">Contenu :</label>
                <textarea type="text" name="comment" id="tinyMCE" id="PostContent" maxlength="255">
                    <?= htmlspecialchars($comment->getComment())?>
                </textarea>

            </div>

        </form>

    </section>

<?php
} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>