<!DOCTYPE html>
<html lang="fr">

    <?php include("header.php"); ?>

    <body>

        <div id="site">

            <?php include("menu.php"); ?>

            <div id="notification"></div>
            
            <?= $content ?>

        </div>

        
        <footer>

            <?php include("footer.php"); ?>
            <?php include("../../scripts.php"); ?>

        </footer>

    </body>
    
</html>