<?php $title = 'Mon Blog'; ?>

    <h1>Post view</h1>
    <p><a href="index.php?p=blog">Retour à la liste des billets</a></p>

<?php ob_start(); ?>

    <?php foreach ($showOnePost as $post): ?>

        <div>
            <h3> <?= htmlspecialchars($post->getTitle()); ?> </h3>
            <p>
                <em>le <?= $post->getDate();?></em> par <?= $post->getAuthor(); ?>
            </p>
            
            <p>
                <?= nl2br(htmlspecialchars($post->getPost()))?>
            </p>
        </div>

        <div class="comments">

            <div>
                <h3>Commentaires</h3>
            </div>
            <form action="index.php?p=addComment&amp;id=<?= $post->getId(); ?>" method="POST">

                <div>
                    <label for="author">Auteur :</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire :</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>

                <input type="submit" value="Poster le commentaire" />

            </form>

        </div>

    <?php endforeach; ?>

    <?php foreach ($comments as $comment): ?>

    <p>De <strong><?= $comment->getAuthor(); ?></strong> le <em><?= $comment->getDate(); ?></em></p>

    <p><?= $comment->getComment(); ?></p>

    <?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>
