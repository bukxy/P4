<?php $title = 'Mon Blog'; ?>

    <h1>Post view</h1>
    <p><a href="index.php?p=blog">Retour à la liste des billets</a></p>

<?php ob_start(); ?>

        <div>
            <h3> 
                <?= htmlspecialchars($post->getTitle()); ?> 
            </h3>

            <p> 
                <em>le <?= $post->getDate();?></em> par <?= $post->getAuthor(); ?> 
            </p>
            
            <p> 
                <?= $post->getPost()?> 
            </p>
        </div>

        <div class="comments">

            <form action="index.php?p=addComment&amp;id=<?= $post->getId(); ?>" method="POST">

                <div>
                    <label for="author">Votre pseudo :</label><br />
                    <input type="text" id="author" name="author" required />
                </div>
                <div>
                    <label for="comment">Votre message :</label><br />
                    <textarea id="comment" name="comment" required ></textarea>
                </div>

                <input type="submit" value="Poster le commentaire" />

            </form>

        </div>

        <div>
            <h3>Commentaires</h3>
        </div>

    <?php foreach ($comments as $comment): ?>

    <p>
        <span class="idComment"><?= $comment->getId() ?></span>

        De <strong><?= htmlspecialchars(strip_tags($comment->getAuthor())); ?></strong> le <em><?= $comment->getDate(); ?></em> | 
        <a href="index.php?p=reportComment&amp;id=<?= $comment->getId() ?>"><button class="buttonReport"><i class="fas fa-comment-slash"></i></button></a>
        <span class="reportTimer"></span>
    </p>

    <p><?= htmlspecialchars(strip_tags($comment->getComment())); ?></p>

    <?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>
