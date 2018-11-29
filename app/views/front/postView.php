<?php $title = htmlspecialchars($post->getTitle()); ?>

<?php ob_start(); ?>

    <h1 class="h1"><?= htmlspecialchars($post->getTitle()); ?> </h1>
        
    <div class="lignesoush1">
        <div class="rondh1bleu left"></div>
        <div class="rondh1bleu right"></div>
        <div class="rondh1bleu topRight"></div>
        <div class="rondh1bleu topLeft"></div>
    </div>

    <p class="backToBlog"><a href="index.php?p=blog">Retour à la liste des articles</a></p>

    <section>

        <div class="onePostContainer">

            <p> 
                <em>le <?= date('d/m/Y à H:i', strtotime($post->getDate()))?></em> par <?= $post->getAuthor(); ?> 
            </p>

            <div class="barre"></div>
            
            <p class="myPost"> 
                <?= $post->getPost()?> 
            </p>

        </div>

    </section>

    <section class="comments">

        <div class="newComment">

            <form action="index.php?p=addComment&amp;id=<?= $post->getId(); ?>" method="POST">

                <div class=postPseudo>
                    <label for="author">Votre pseudo :</label><br />
                    <input type="text" id="author" name="author" maxlength="15" required />
                </div>
                <div class="postMessage">
                    <label for="comment">Votre message :</label><br />
                    <textarea id="comment" name="comment" maxlength="255" required ></textarea>
                </div>

                <input type="submit" value="Poster le commentaire" />

            </form>

        </div>

        <div>

            <div>   
                <h3>Vos commentaires</h3>
            </div>

            <?php if ($comments) {

                foreach ($comments as $comment): ?>

                <div class="myCommentContainer">

                    <p class="commentInfo">
                        De <strong><?= htmlspecialchars(strip_tags($comment->getAuthor())); ?></strong> le <em><?= date('d/m/Y à H:i', strtotime($comment->getDate()))?></em> | 

                        <?php if (!isset($_COOKIE['idCommentReport-'. $comment->getId()])) {

                            echo $_COOKIE['idCommentReport-'. $comment->getId()]; ?>
                            <a href="index.php?p=reportComment&amp;id=<?= $comment->getId() ?>"><button class="buttonReport"><i class="fas fa-comment-slash"></i></button></a>

                        <?php } else { ?>
                            Signalé
                        <?php } ?>
                    </p>

                    <p class="theComment">
                        <?= htmlspecialchars(strip_tags($comment->getComment())); ?>
                    </p>

                </div>
            
            <?php endforeach; ?>

            <?php } else { ?>
                <p>Il n'y a pour le moment aucun commentaire</p>
            <?php } ?>

        </div>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>