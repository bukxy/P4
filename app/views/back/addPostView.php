<?php
session_start();
ob_start(); 

if (isset($_SESSION['pseudo'])) { ?>

    <?php $title = 'Nouveau chapitre'; ?>
    <?php $titleCat = 'Ajout d\'un nouveau chapitre'; ?>

    <section class="myNewPost">

    <a href='index.php?p=admin'><input class="buttonAdminPost cancel" name="Button" value="Annuler" type="button" /></a>

        <form action="index.php?p=addANewPost" method="POST">

        <input name="userId" value="<?= $user->getId(); ?>" type="hidden" />

            <div>

                <label for="title">Titre du chapitre :</label><br />
                <input type="text" name="title" class="editInput" placeholder="Mon titre" required>
                
            </div>

            <div>

                <label for="author">Auteur du chapitre :</label><br />
                <input type="text" name="author" class="editInput" placeholder="Auteur" required>

            </div>

            <div>

                <label for="post">Contenu du chapitre :</label><br />
                <textarea name="post" id="tinyMCE" id="PostContent"></textarea>

            </div>

            <input class="buttonAdminPost addPost" type="submit" value="Publier le chapitre" />

        </form>

    </section>

<?php
} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>