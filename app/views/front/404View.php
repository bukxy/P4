<?php $title = 'Page introuvable'; ?>

<?php ob_start(); ?>

    <div class="notFound">
        <img src="../app/images/404.png" alt="404 page introuvable">
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>