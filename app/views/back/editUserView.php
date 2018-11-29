<?php
session_start();
ob_start(); 

if (isset($_SESSION['pseudo'])) { ?>

    <?php $title = 'Modification de l\'utilisateur'; ?>
    <?php $titleCat = 'Modification de l\'utilisateur'; ?>

    <section class="myNewPost">

        <form action="index.php?p=updateUser&amp;id=<?= $user->getId() ?>" method="post">

            <div>
                <a href='index.php?p=usersList'><input class="buttonAdminPost cancel" name="Button" value="Annuler" type="button" /></a>

                <input name="id" value="<?= $user->getId() ?>" type="hidden" />
                <a href="index.php?p=updateUser&amp;id=<?= $user->getId() ?>"><input class="buttonAdminPost saveEdit" name="edit" value="Sauvegarder les modifications" type="submit" /></a>

            </div>

            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" placeholder="Pseudo" class="editInput" maxlength="15" value="<?= htmlspecialchars($user->getPseudo()); ?>" required>

            <label for="email">Email :</label>
            <input type="text" name="email" placeholder="Email" class="editInput" value="<?= htmlspecialchars($user->getEmail()); ?>" required>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" placeholder="Mot de passe" class="editInput" required>

        </form>

    </section>

<?php
} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>