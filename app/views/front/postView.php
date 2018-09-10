<h1>Post view</h1>

<?php

$post = App\App::getDb()->prepare('SELECT * FROM posts WHERE post_id = ?', [$_GET['id']], 'App\models\PostManager', true);

?>

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

    <?php $comment = App\App::getDb()->prepare('SELECT * FROM comments WHERE comment_id_post = ?', [$_GET['id']], 'App\models\Comment'); ?>

    <div>
    <h2><?= $comment->getCommentAuthor(); ?></h2>

    <p><?= $comment->getComment(); ?></p>
    <p><?= $comment->getDate(); ?></p>
    </div>

</div>
