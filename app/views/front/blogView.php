<?php $title = 'Mon Blog'; ?>

<?php ob_start(); ?>

<div class="h1Page">
    <h1>Mes derniers articles :</h1>
</div>

<?php foreach ($posts as $post): ?>

    <section class="postContainer">
        <div>
            <h2> <?= htmlspecialchars($post->getTitle()); ?> </h2>
            <p>
                <em>le <?= $post->getDate();?></em> par <?= $post->getAuthor(); ?>
            </p>

            <div>
                <p>
                    <?= substr(($post->getPost()), 0, 400); ?>
                    <br />
                </p>
            </div>

            <div class="buttonVoirLaSuite">
                <a href="index.php?p=post&amp;id=<?= $post->getId() ?>">
                    <span>Voir la suite</span>
                </a>
            </div>
        </div>
    </section>

<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>