<?php
session_start();
ob_start(); 

if (isset($_SESSION['pseudo'])) { ?>

    <?php $title = 'Nouvel utilisateur'; ?>
    <?php $titleCat = 'Ajout d\'un nouvel utilisateure'; ?>

    <section class="myNewPost">

    <a href='index.php?p=usersList'><input class="buttonAdminPost cancel" name="Button" value="Annuler" type="button" /></a>

        <form action="index.php?p=addANewUser" method="POST">

            <div>

                <label for="pseudo">Pseudo :</label><br />
                <input type="text" name="pseudo" class="editInput" placeholder="Pseudo" required>

            </div>

            <div>

                <label for="email">Email :</label><br />
                <input type="text" name="email" class="editInput" placeholder="Email" required>

            </div>

            <div>

                <label for="password">Mot de passe :</label><br />
                <input type="password" name="password" class="editInput" placeholder="Mot de passe" required>

            </div>

            <input class="buttonAdminPost addPost" type="submit" value="Valider" />

        </form>

    </section>

<?php
} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>