<?php ob_start(); ?>

<?php $title = 'Modification de l\'article'; ?>
<?php $titleCat = 'Modification de l\'article'; ?>

<?php foreach ($showOnePost as $post): ?>

    <div>
        <button name="Button" type="submit">Annuler</button>
        <a href="index.php?p=updatePost&amp;id=<?= $post->getId() ?>"><button name="Button" type="submit">Sauvegarder les modifications</button></a>
    </div>

  <div>

    <label for="title">Titre de l'article :</label><br />
    <input type="text" name="title" placeholder="Mon titre" class="editInput" value="<?= htmlspecialchars($post->getTitle()); ?>" required>
    
    <br /><br />
    <p>
        Date de l'article : <em>le <?= $post->getDate();?></em> par <?= $post->getAuthor(); ?>
    </p>

    <p>Contenu de l'article :</p>
    <textarea type="text" name="post" id="PostContent" required>
        <?= nl2br(htmlspecialchars($post->getPost()))?>
    </textarea>

  </div>

<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>