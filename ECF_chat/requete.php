<?php 

if (isset($_POST["submit_message"])){
    
    //Assainissement
    $contributeur = trim(htmlentities($_POST["contributeur"]));
    $message = trim(htmlentities($_POST["message"]));

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
        // Annule les transactions et restaure le mode autocommit
        
	echo "Erreur : " . $e->getMessage();
    }
}

