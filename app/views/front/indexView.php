<?php $title = 'Page index'; ?>

<?php ob_start(); ?>

    <h1>Page index</h1>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>