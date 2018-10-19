<?php ob_start(); ?>

<?php $title = 'Modification de l\'article'; ?>
<?php $titleCat = 'Modification de l\'article'; ?>

    <table>

        <tr>
            <td>Titre de l'article</td>
            <td>Auteur</td>
            <td>Commentaire</td>
            <td>Date</td>
        </tr>

        <?php foreach ($allComments as $comments): ?>

        <tr>
            <td>Titre de l'article</td>
            <td><?= $comments->getAuthor();?></td>
            <td><?= substr(nl2br(htmlspecialchars($comments->getComment())), 0, 60)?></td>
            <td><?= $comments->getDate();?></td>
            <td>
			    <a href="index.php?p=deleteComment&amp;id=<?= $comments->getId() ?>"><input name="ButtonDeletePost" value="Supprimer" type="submit" /></a>
			    <a href="index.php?p=editComment&amp;id=<?= $comments->getId() ?>"><input name="ButtonEditPost" value="Modifier" type="submit" /></a>
            </td>
        </tr>

        <?php endforeach; ?>

    </table>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>