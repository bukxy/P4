<?php $title = 'Connexion'; ?>

<?php ob_start();

session_start();

if (isset($_SESSION['message'])) {?>

    <div id="connexionFailed">
        <p><?= $_SESSION['message'] ?></p>

        <?php unset($_SESSION['message']); ?>
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