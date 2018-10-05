
<?php $title = 'Mon Blog'; ?>

<h1>Derniers posts :</h1>
<?php ob_start(); ?>

<?php foreach ($posts as $post): ?>

    <div>
        <h3> <?= htmlspecialchars($post->getTitle()); ?> </h3>
        <p>
            <em>le <?= $post->getDate();?></em> par <?= $post->getAuthor(); ?>
        </p>
        
        <p>
            <?= nl2br(htmlspecialchars($post->getPost()))?>
            <br />
            <em><a href="index.php?p=post&amp;id=<?= $post->getId() ?>">Voir la suite</a></em>
        </p>
    </div>

<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>