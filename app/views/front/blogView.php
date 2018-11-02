
<?php $title = 'Mon Blog'; ?>

<h1>Derniers posts :</h1>
<?php ob_start(); ?>

<?php foreach ($posts as $post): ?>

    <div class="postContainer">
        <div>
            <h3> <?= htmlspecialchars($post->getTitle()); ?> </h3>
            <p>
                <em>le <?= $post->getDate();?></em> par <?= $post->getAuthor(); ?>
            </p>

            <div>
                <p>
                    <?= strip_tags(substr(($post->getPost()), 0, 400)); ?>
                    <br />
                </p>
            </div>
            <a href="index.php?p=post&amp;id=<?= $post->getId() ?>"><input class="buttonVoirLaSuite" name="suite" value="Voir la suite" type="button" /></a>
        </div>
    </div>

<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>