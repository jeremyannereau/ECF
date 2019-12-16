<?php 

//Requete soumission d'un message
if (isset($_POST["submit_message"])){
    
    //Assainissement
    $contributeur = trim(htmlentities($_SESSION["login"]));
    $message = trim(htmlentities($_POST["message"]));

    if (empty($contributeur) OR empty($message)){
        echo "Erreur : Veuillez remplir votre pseudo ET votre message";
    } else{
        try{
            $req_prep = $conn->prepare(
                "INSERT INTO message(contributeur,contenu_message)
                VALUES(?,?)");
            $req_prep-> bindParam(1,$contributeur);
            $req_prep-> bindParam(2,$message);
            $req_prep->execute();
                

        }

        /*On capture les exceptions si une exception est lancée et on affiche
        *les informations relatives à celle-ci*/
        
        catch(PDOException $e){
                    
        echo "Erreur : " . $e->getMessage();
        }
    }
}

//Requete inscription
if (isset($_POST["inscription"])){
    $form_valid = TRUE;
    $form_error_msg = "";

    //Assainissement
    $login = trim(htmlentities($_POST["login"]));
    $mail = trim(htmlentities($_POST["mail"]));
    $mail2 = trim(htmlentities($_POST["mail2"]));
    $pass = password_hash((trim(htmlentities($_POST["pass"]))), PASSWORD_DEFAULT);
    $pass2 = trim(htmlentities($_POST["pass2"]));

    //Champs saisis ?
    if (empty($login) OR empty($login)){
        $form_valid = FALSE;
        $form_error_msg = "Identifiant ET/OU mot de passe non saisi";
    }
    
    //Mots de passe correspondants ?
    if (!password_verify($pass2,$pass)){
        $form_valid = FALSE;
        $form_error_msg = "Les mots de passe ne correspondent pas";
    }

    //Mails
    if (!(filter_var($mail, FILTER_VALIDATE_EMAIL))){
        $form_valid = FALSE;
        $form_error_msg = "L'adresse e-mail n'est pas valide";
    }else{
        if(($mail !== $mail2)){
            $form_valid = FALSE;
            $form_error_msg = "Les adresses mails ne correspondent pas";
        }
    }

    //Mail ou pseudo existant dans la bdd ?

    if ($form_valid){
        
            try{
                $req_prep = $conn->prepare(
                    "SELECT idUser 
                    FROM user 
                    WHERE mail=?
                    OR pseudo=?");
                $req_prep-> bindParam(1,$mail);
                $req_prep-> bindParam(2,$pseudo);
                $req_prep->execute();

                $results = $req_prep ->fetchAll(\PDO::FETCH_ASSOC);

                if ($results){
                    echo "Pseudonyme et/ou adresse mail déja existant(s)";
                }else{
                    $req_prep = $conn->prepare(
                        "INSERT INTO user(pseudo,mail,password)
                        VALUES(?,?,?)");
                    $req_prep-> bindParam(1,$login);
                    $req_prep-> bindParam(2,$mail);
                    $req_prep-> bindParam(3,$pass);
                    $req_prep->execute();
                    echo "Votre inscription est validée";
                    $_SESSION["login"]=$login;
                    
                }
            }
    
            /*On capture les exceptions si une exception est lancée et on affiche
            *les informations relatives à celle-ci*/
            
            catch(PDOException $e){
                        
            echo "Erreur : " . $e->getMessage();
            }
        }else{
            echo $form_error_msg;
        }

}

//Requete connexion d'un user
if (isset($_POST["connexion"])){
    $form_valid = TRUE;
   
    //Assainissement des variables

    $login = trim(htmlentities($_POST["login_connexion"]));
    $pass = password_hash((trim(htmlentities($_POST["motdepasse_connexion"]))), PASSWORD_DEFAULT);

    
    //Recherche le login dans la bdd

    if (empty($_POST["login_connexion"]) OR empty($_POST["motdepasse_connexion"])){
        echo "Pseudonyme et/ou mot de passe vide(s)";
        $form_valid = FALSE;
    }

   if ($form_valid){
        try{
            $req_prep = $conn->prepare(
                "SELECT idUser,password 
                FROM user 
                WHERE pseudo=? 
                ");
            $req_prep-> bindParam(1,$login);
            $req_prep->execute();
            $results = $req_prep ->fetchAll(\PDO::FETCH_ASSOC);
           
            if (!$results){
                echo "Pseudonyme et/ou adresse mail incorrect(s)";
            }else{
                foreach($results as $result){
                    if (!password_verify($result['password'],$pass))
                    {
                        $_SESSION["login"]=$login;                     
                       
                    }else{
                        echo "Pseudonyme et/ou adresse mail incorrect(s)";
                    }
                }    
            }
        }
        /*On capture les exceptions si une exception est lancée et on affiche
            *les informations relatives à celle-ci*/
            
        catch(PDOException $e){                
            echo "Erreur : " . $e->getMessage();
        }
    }
}

//On affiche les bons formulaires

if (empty($_SESSION['login'])){
    require('inscription_connexion.html');
}else{
    require('connecte_chat.php');
    require("messages_html.php");
}
