<!DOCTYPE html>
<html lang="fr">

    <?php include("header.php"); ?>

    <body>

        <div id="site">

            <?php include("menu.php"); ?>
            
            <div class="starter-template" style="padding-top: 100px;">
                <?= $content; ?>
            </div>

        </div>
        
        <?php include("footer.php"); ?>

        <script src="js/jquery.js"></script>

    </body>
    
</html>
