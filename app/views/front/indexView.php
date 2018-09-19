<h1>Blog</h1>

<?php foreach ($posts as $post): ?>

<h1> <?= htmlspecialchars($post->$allPosts) ?>

<?php endforeach; ?>