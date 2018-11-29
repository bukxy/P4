<?php
session_start();
ob_start(); 

if (isset($_SESSION['pseudo'])) { ?>

    <?php $title = 'Nouvel article'; ?>
    <?php $titleCat = 'Ajout d\'un nouvel article'; ?>

    <section class="myNewPost">

    <a href='index.php?p=admin'><input class="buttonAdminPost cancel" name="Button" value="Annuler" type="button" /></a>

        <form action="index.php?p=addANewPost" method="POST">

            <div>

                <label for="title">Titre de l'article :</label><br />
                <input type="text" name="title" class="editInput" placeholder="Mon titre" required>
                
            </div>

            <div>

                <label for="author">Auteur l'article :</label><br />
                <input type="text" name="author" class="editInput" placeholder="Auteur" required>

            </div>

            <div>

                <label for="post">Contenu de l'article :</label><br />
                <textarea name="post" id="tinyMCE" id="PostContent"></textarea>

            </div>

            <input class="buttonAdminPost addPost" type="submit" value="Publier l'article" />

        </form>

    </section>

<?php
} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>