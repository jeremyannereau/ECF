
 
 <form method = "POST" name = "contribution_chat" action ="index.php" class = "contribution">
                <p>Votre pseudo :</p>
              
                <p><strong><?=$_SESSION['login'] ?></strong></p>
                </br>
                <label for = "message">Votre Message :</label>
                </br>
                <textarea name="message" id="message" rows="10" cols="30">
                </textarea>
                </br>
                <input type ="submit" name ="submit_message" value ="Envoyer">
                </br>
                <a href="logout.php">Me déconnecter</a>
            </form>
        
    </div>