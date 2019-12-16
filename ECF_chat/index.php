<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>

<?php
    // Connexion
    require_once("db_connect.php");
?>

<main>
    <form method = "POST" name = "contribution_chat" action ="index.php">
        <label for = "contributeur">Votre Pseudo :</label>
        </br>
        <input type = "text" name = "contributeur" id="contributeur"> 
        </br>
        <label for = "message">Votre Message :</label>
        </br>
        <textarea name="message" id="message" rows="10" cols="30">
        </textarea>
        </br>
        <input type ="submit" name ="submit_message" value ="Envoyer">
        </br>
        
        <?php
            //Requête d'ajout de message
            require_once("requete.php");
            //Requête d'affichage'
            require("messages_html.php");
        ?>

    </form>
</main>

</html>

<?php
    // On "kill" la connexion
    $conn=null;
?>
