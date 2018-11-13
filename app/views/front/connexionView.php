<?php
session_start();
$title = 'Connexion'; ?>

<?php ob_start();

if (isset($_SESSION['notif'])) {?>

    <div id="connexionFailed">
        <p>
			<?= $_SESSION['notif'];
			unset($_SESSION['notif']); ?>
		</p>
    </div>

<?php 
} ?>

    <form action="index.php?p=checkUserConnexion" method="POST">

        <div id="connexionContainer">

            <h2>Connexion à l'administration</h2>

            <input type="text" placeholder="Votre nom d'utilisateur" name="pseudo" required>

            <input type="password" placeholder="Votre mot de passe" name="password" required>
                
            <button class="buttonConnexion" type="submit"><i class="fas fa-sign-in-alt icon-connexion"></i>Connexion</button>

        </div>

    </form>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>