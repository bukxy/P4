<?php ob_start(); ?>

<?php $title = 'Gestion des commentaires'; ?>
<?php $titleCat = 'Gestion des commentaires'; ?>

    <table>

        <tr>
            <td>Auteur</td>
            <td>Commentaire</td>
            <td>Date</td>
            <td>Signalements</td>
        </tr>
 
        <?php foreach ($allComments as $comments): ?>

        <tr>
            <td><?= $comments->getAuthor();?></td>
            <td><?= substr(nl2br(htmlspecialchars($comments->getComment())), 0, 60)?></td>
            <td><?= $comments->getDate();?></td>
            <td><?= $comments->getReport();?></td>
            <td>
			    <a href="index.php?p=deleteComment&amp;id=<?= $comments->getId() ?>"><input name="ButtonDeletePost" value="Supprimer" type="submit" /></a>
			    <a href="index.php?p=editComment&amp;id=<?= $comments->getId() ?>"><input name="ButtonEditPost" value="Modifier" type="submit" /></a>
            </td>
        </tr>

        <?php endforeach; ?>

    </table>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>