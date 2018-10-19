
<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

    <form action="index.php?p=checkUserConnexion" method="POST">

        <div class="container">
            <label for="email"><b>Username</b></label>
            <input type="text" placeholder="Votre email" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Votre mot de passe" name="password" required>
                
            <button class="buttonconnexion" type="submit">Connexion</button>

        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>

    </form>

    <?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>