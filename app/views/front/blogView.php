<?php $title = 'Mon Blog'; ?>

<?php ob_start(); ?>

    <h1 class="h1">Mes derniers articles</h1>
        
    <div class="lignesoush1">
        <div class="rondh1bleu left"></div>
        <div class="rondh1bleu right"></div>
        <div class="rondh1bleu topRight"></div>
        <div class="rondh1bleu topLeft"></div>
    </div>

<?php foreach ($posts as $post): ?>

    <section class="postContainer">
        <div>
            <h2> <?= htmlspecialchars($post->getTitle()); ?> </h2>

            <div class="postContent">
                <p>
                    <?= substr(($post->getPost()), ' 0', 400); ?>
                    <br />
                </p>
            </div>

            <div class="postInfoButton">
                <p class="postInfo">
                    <em>le <?= date('d/m/Y à H:m:s', strtotime($post->getDate()))?></em> par <?= $post->getAuthor(); ?>
                </p>

                <div class="buttonVoirLaSuite">
                    <a href="index.php?p=post&amp;id=<?= $post->getId() ?>">
                        <span>Voir la suite</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>