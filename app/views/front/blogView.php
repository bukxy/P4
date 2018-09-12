<h1>Blog</h1>

<?php foreach (\App\models\PostManager::getLast() as $post): ?>

<h2>
    <a href="<?= $post->getUrl() ?>"><?= $post->getTitle(); ?></a>
</h2>

<p><?= $post->getExtrait(); ?></p>

<?php endforeach; ?>

<p>De <strong><?= $comment->getAuthor(); ?></strong> le <em><?= $comment->getDate(); ?></em></p>

<p><?= $comment->getComment(); ?></p>