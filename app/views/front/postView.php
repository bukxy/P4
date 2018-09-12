<h1>Post view</h1>

<?php $post = App\models\PostManager::getPost(); ?>

<h2><?= $post->getTitle(); ?></h2>

<p><?= $post->getContent(); ?></p>

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


<?php foreach (App\models\CommentManager::getComments() as $comment): ?>

<?= var_dump($comment->getComments()); ?>

<p>De <strong><?= $comment->getAuthor(); ?></strong> le <em><?= $comment->getDate(); ?></em></p>

<p><?= $comment->getComment(); ?></p>

<?php endforeach; ?>
