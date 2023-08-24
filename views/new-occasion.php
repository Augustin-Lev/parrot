<h1>Nouvelle occasion</h1>
<form class="new_occasion" action="../controller/administration.php" method="POST" enctype="multipart/form-data">
    <?php 
        // var_dump($occasions);
        foreach($occasions as $parametre){
            if (key($occasions) == "id" || key($occasions) == "modificateur"){
                next($occasions);
            }else{
                if(substr(key($occasions),0,5) == "image"){
                    for ($nbImages = 1; $nbImages <10; $nbImages++ ){
                        ?>
                        <div>
                            <label for="image">Image</label>
                            <input type="file" accept="image/png, image/jpeg" name="image<?php echo $nbImages;?>" value="../image/occasion/<?php echo $occasions["id"].'/image'.$parametre.'.jpg';?>">
                        </div>
                        <?php 
                    }
                    next($occasions);
                    if ($parametre != 0){
                        // var_dump($parametre);
                        echo "<input type='hidden' name='nbImagesDeja' value='".$parametre."'>";
                    }

                }else{
                    ?>
                        <div>
                            <label for="<?php echo key($occasions);  ?>"><?php echo key($occasions);  ?></label>
                            <input type="text"  name="<?php echo key($occasions);  ?>" value="<?php if(isset($voiture[key($occasions)])) {echo $voiture[key($occasions)];}  ?>">
                        </div>
                    <?php 
                    next($occasions);
                }
            
            }
        }
        
    ?>
    <a title="Nouvelle caractéristique" href="../controller/administration.php?action=newCaracteristique" target="_blank" class="boutton">Ajouter une caractéristique</a>
    <a title="Nouvelle option" href="../controller/administration.php?action=newOption" target="_blank" class="boutton">Ajouter une Option</a>
    <input style="display:none" type="text" name="action" value="ajout-new-occasion">
    <input type="hidden" name="id" value=  <?php if(isset($_POST["id"])) {echo $_POST["id"];} ?>>

    <button class="boutton" type="submit">Ajouter</button>
    <a title="Retour vers le panneau d'administration"href="../controller/administration.php">Retour</a>
</form>