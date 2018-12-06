<?php
session_start();
ob_start(); 

if (isset($_SESSION['pseudo'])) {

    if (isset($_SESSION['notificationAdminYes'])) {?>
        
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

    <?php $title = 'Gestion des utilisateurs'; ?>
    <?php $titleCat = 'Gestion des utilisateurs'; ?>

    <a href="index.php?p=newUser"><input class="buttonAdminPost addPost" value="Nouvel Utilisateur" type="button" /></a>

    <?php foreach ($users as $user): ?>

        <section class="adminListPosts">
            <p>Pseudo : <?= htmlspecialchars($user->getPseudo());?></p>
            <p>Email : <?= htmlspecialchars($user->getEmail());?></p>
            <div>
                <?php if ($user->getId() >= 2) { ?>
                    <a href="index.php?p=deleteUser&amp;id=<?= $user->getId() ?>"><input class="buttonAdminPost deleteUser" value="Supprimer l'utilisateur" type="button" /></a>
                <?php } ?>
                <a href="index.php?p=editUser&amp;id=<?= $user->getId() ?>"><input class="buttonAdminPost editUser" value="Modifier l'utilisateur" type="submit" /></a>
            </div>
        </section>

    <?php endforeach;

} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>