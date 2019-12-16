<?php
	$servername = 'localhost';
    $db_name = 'chat';
	$username = 'root';
	$password = '';
	
    //On essaie de se connecter
    
	try{
        $conn = new PDO("mysql:host=$servername;dbname=".$db_name, $username, $password);
        
        // On définit le mode d'erreur de PDO sur Exception
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo 'Connexion réussie';

	}

	/*On capture les exceptions si une exception est lancée et on affiche
    *les informations relatives à celle-ci*/
    
	catch(PDOException $e){
        // Annule les transactions et restaure le mode autocommit
        
	echo "Erreur : " . $e->getMessage();
    }
    
   
?>
