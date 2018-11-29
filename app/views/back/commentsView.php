<?php
session_start();
ob_start(); 

if (isset($_SESSION['pseudo'])) {

    if (isset($_SESSION['notificationAdminYes'])) {?>
        
        <div class="notifAdmin notifAdminGreen">
            <p>
                <?= $_SESSION['notificationAdminYes'];
                unset($_SESSION['notificationAdminYes']); ?>
            </p>
        </div>

    <?php } elseif (isset($_SESSION['notificationAdminNo'])) {?>
        
        <div class="notifAdmin notifAdminRed">
            <p>
                <?= $_SESSION['notificationAdminNo'];
                unset($_SESSION['notificationAdminNo']); ?>
            </p>
        </div>

    <?php } ?>

    <?php $title = 'Gestion des commentaires'; ?>
    <?php $titleCat = 'Gestion des commentaires'; ?>

    <section class="commentList">

        <table>

            <tr>
                <th>Auteur</th>
                <th>Commentaire</th>
                <th>Date</th>
                <th>Signalements</th>
                <th>Suppression / Modification</th>
            </tr>

            <?php foreach ($allComments as $comments): ?>

                <tr>
                    <td><?= htmlspecialchars($comments->getAuthor());?></td>
                    <td><?= htmlspecialchars(substr(strip_tags($comments->getComment()), 0, 60))?></td>
                    <td><?= date('d/m/Y à H:i', strtotime($comments->getDate()))?></td>
                    <td><?= $comments->getReport();?></td>
                    <td>
                        <div>
                            <a href="index.php?p=deleteComment&amp;id=<?= $comments->getId() ?>"><input class="buttonAdminPost deleteComment" name="ButtonDeleteComment" value="Supprimer" type="submit" /></a>
                        </div>
                        <div>
                            <a href="index.php?p=editComment&amp;id=<?= $comments->getId() ?>"><input class="buttonAdminPost editComment" name="ButtonEditPost" value="Modifier" type="submit" /></a>
                        </div>
                    </td>
                </tr>

            <?php endforeach; ?>

        </table>

    </section>

<?php
} else {
	header('Location: index.php?p=connexion');
} ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/back/templates/default.php');?>