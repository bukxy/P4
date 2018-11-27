<?php
session_start();
ob_start(); 

if (isset($_SESSION['pseudo'])) { ?>

    <?php $title = 'Modification de l\'article'; ?>
    <?php $titleCat = 'Modification de l\'article'; ?>

    <section>

        <form action="index.php?p=updatePost&amp;id=<?= $post->getId() ?>" method="post">

            <div>
                <a href='index.php?p=admin'><input class="buttonAdminPost cancelPost" name="Button" value="Annuler" type="button" /></a>

                <input name="id" value="<?= $post->getId() ?>" type="hidden" />
                <a href="index.php?p=updatePost&amp;id=<?= $post->getId() ?>"><input class="buttonAdminPost saveEditPost" name="edit" value="Sauvegarder les modifications" type="submit" /></a>

            </div>

            <label for="title">Titre de l'article :</label>
            <input type="text" name="title" placeholder="Mon titre" class="editInput" value="<?= htmlspecialchars($post->getTitle()); ?>" required>

            <br /><br />
            <p>
                Date de l'article : <em>le <?= date('d/m/Y à H:m:s', strtotime($post->getDate()))?></em>
            </p>

            <label for="title">Auteur :</label>
            <input type="text" name="author" placeholder="Auteur" class="editInput" value="<?= htmlspecialchars($post->getAuthor()); ?>" required>

            <p>
                Contenu :
            </p>
            <textarea type="text" name="post" id="tinyMCE" id="PostContent" required>
                <?= htmlspecialchars($post->getPost())?>
            </textarea>

        </form>

    </section>

<?php
} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>