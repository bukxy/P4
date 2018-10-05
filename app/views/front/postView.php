
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

    <?php endforeach; ?>

    <div class="comments">

        <div>
            <h3>Commentaires</h3>
        </div>

        <form action="../app/models/comment.php" method="POST">

            <p><label for="pseudo">Pseudo : </label>
            <input type="text" name="pseudo" /></p>

            <p><label for="comment">Commentaire : </label>
            <input type="text" name="comment"></p>

            <input type="submit" name="sendComment" />

        </form>

    </div>

    <?php foreach ($comments as $comment): ?>

    <p>De <strong><?= $comment->getAuthor(); ?></strong> le <em><?= $comment->getDate(); ?></em></p>

    <p><?= $comment->getComment(); ?></p>

    <?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>
