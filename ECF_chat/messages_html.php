<div class = "chat_content">
    
    <?php
        $req_prep2 = $conn->prepare(
            "SELECT contributeur, contenu_message, time_post 
            FROM message ORDER BY time_post DESC");
        $req_prep2->execute();
        $results = $req_prep2 ->fetchAll(\PDO::FETCH_ASSOC);
    
        foreach($results as $result){
    ?>

    <div class ="pseudo_chat">
        <p><strong> Pseudo : <?php echo $result["contributeur"] ;?> </strong></p>
        <p><?php $datetime = DateTime::createFromFormat("Y-m-d H:i:s", $result["time_post"]);
				echo "le ".$datetime->format("d/m/Y à H:i:s");  ?></p>   
    </div>

    <div class ="message_chat">
        <p><?php echo $result["contenu_message"]; ?></p>
        </br> 
    </div>

    <?php
    }
    ?>

</div>
