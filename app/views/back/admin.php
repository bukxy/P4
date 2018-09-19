<!DOCTYPE html>
<html>
    <head>
        <title>Titre de la page</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        $reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
        while ($donnees = $reponse->fetch())
        {
            echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
        }
        
        $reponse ->closeCursor();
        ?>
        <form action='minichat.php' method="POST">
            <p><label>Votre pseudo : <input type="text" name="pseudo" /></label></p>
            <p><label>Message : <input type="text" name="message" /></label></p>
            <p><input type="submit"></p>
        </form>
    </body>
</html>