<?php if(isset($_POST["id"])) {echo "<h1>Modification occasion</h1>";}else{ ?>
<h1>Nouvelle occasion</h1>
<?php } ?>
<form class="new_occasion" action="<?php echo BASE_URL;?>/ajout/occasion" method="POST" enctype="multipart/form-data">
    <?php 
        // var_dump($occasions);
        foreach($occasions as $parametre){
            if (key($occasions) == "id" || key($occasions) == "modificateur"){
                next($occasions);
            }else{
                if(substr(key($occasions),0,5) == "image"){
                    for ($nbImages = 1; $nbImages <8; $nbImages++ ){
                        ?>
                        <div class="parametre">
                            <label for="image">Image</label>
                            <input type="file" accept="image/png, image/jpeg" name="image<?php echo $nbImages;?>">
            
                        </div>
                        <?php 
                    }
                    next($occasions);
                    if ($parametre != 0 && isset($_POST["id"])){
                        // var_dump($parametre);
                        echo "<input type='hidden' name='nbImagesDeja' value='".($parametre)."'>";
                    }else{
                        echo "<input type='hidden' name='nbImagesDeja' value='0'>";
                    }

                }else{
                    ?>
                        <div class="parametre">
                            <label for="<?php echo key($occasions);  ?>"><?php echo key($occasions);  ?></label>
                            <input type="text"  name="<?php echo key($occasions);  ?>" value="<?php if(isset($voiture[key($occasions)])) {echo $voiture[key($occasions)];}  ?>">
                        </div>
                    <?php 
                    next($occasions);
                }
            
            }
        }
        
    ?>
    <div class="new_occasion_bouttons">
        <a title="Nouvelle caractéristique" href="<?php echo BASE_URL;?>/nouvelle/caracteristique" target="_blank" class="boutton">Ajouter une caractéristique</a>
        <a title="Nouvelle option" href="<?php echo BASE_URL;?>/nouvelle/option" target="_blank" class="boutton">Ajouter une Option</a>
        <input style="display:none" type="text" name="action" value="ajout-new-occasion">
        <input type="hidden" name="id" value=  <?php if(isset($_POST["id"])) {echo $_POST["id"];} ?>>

        <button class="boutton" type="submit">Ajouter</button>
        <a title="Retour vers le panneau d'administration" href="<?php echo BASE_URL;?>/administration">Retour</a>
    </div>
   
</form>