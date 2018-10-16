<?php ob_start(); ?>

<?php $title = 'Modification de l\'article'; ?>
<?php $titleCat = 'Modification de l\'article'; ?>

<?php foreach ($showOnePost as $post): ?>

    <form method="post">

        <a href='index.php?p=admin'><input name="Button" value="Annuler" type="button" /></a>

        <input name="id" value="<?= $post->getId() ?>" type="hidden" />
        <a href="index.php?p=editPost&amp;id=<?= $post->getId() ?>"><input name="edit" value="Sauvegarder les modifications" type="submit" /></a>

        <label for="title">Titre de l'article :</label><br />
        <input type="text" name="title" placeholder="Mon titre" class="editInput" value="<?= htmlspecialchars($post->getTitle()); ?>" required>
        
        <br /><br />
        <p>
            Date de l'article : <em>le <?= $post->getDate();?></em> par <?= $post->getAuthor(); ?>
        </p>

        <p>Contenu de l'article :</p>
        <textarea type="text" name="post" id="tinyMCE" id="PostContent" required>
            <?= nl2br(htmlspecialchars($post->getPost()))?>
        </textarea>

    </form>

<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>