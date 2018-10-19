<?php ob_start(); ?>

<?php $title = 'Modification du commentaire'; ?>
<?php $titleCat = 'Modifocation du commentaire'; ?>

    <form method="post">

        <a href='index.php?p=comments'><input name="Button" value="Annuler" type="button" /></a>

        <p><?= htmlspecialchars($comment->getTitle()); ?></p>
        <input name="id" value="<?= $comment->getId() ?>" type="hidden" />
        <a href="index.php?p=editPost&amp;id=<?= $comment->getId() ?>"><input name="edit" value="Sauvegarder les modifications" type="submit" /></a>

        <label for="title">Titre de l'article :</label><br />
        <input type="text" name="title" placeholder="Mon titre" class="editInput" value="<?= htmlspecialchars($comment->getTitle()); ?>" required>
        
        <br /><br />
        <p>
            Date de l'article : <em>le <?= $comment->getDate();?></em> par <?= $comment->getAuthor(); ?>
        </p>

        <p>Contenu de l'article :</p>
        <textarea type="text" name="post" id="tinyMCE" id="PostContent" required>
            <?= nl2br(htmlspecialchars($comment->getPost()))?>
        </textarea>

    </form>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>