<!DOCTYPE html>
<html lang="fr">

    <?php include("header.php"); ?>

    <body  style="padding-top: 100px;">

        <div id="site">

            <?php include("menu.php"); ?>

            <div id="notification"></div>
            
            <?= $content ?>

        </div>

    </body>

        <footer>

            <?php include("footer.php"); ?>
            <?php include $_SERVER['DOCUMENT_ROOT']."/app/views/scripts.php"; ?>

        </footer>
    
</html>