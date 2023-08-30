<div class="slider">
<input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav"/>

<?php //var_dump($voiture["imageClef"]);
for( $i=1; $i< $voiture["imageClef"];$i++){?>
        <input type="radio" name="slider" title="slide<?php echo $i+1; ?>" for="slide<?php echo $i+1; ?>" class="slider__nav"/>
<?php }?>
    <div class="slider__inner" style="width:<?php echo $voiture["imageClef"]; ?>00%;">
        <?php 
        foreach(scandir("views/image/occasion/".$voiture["id"]) as $image){
            if($image != "." && $image != ".."){ ?>
                <div class="slider__contents">
                <img class="slider__txt" src="<?php echo BASE_URL;?>/views/image/occasion/<?php echo $voiture["id"]?>/<?php echo $image;?>">
                </div>
        
            <?php }
        }?>
    </div>
</div>


<div class="occasionPlus">

    <form action="<?php echo BASE_URL;?>/reserver" method="POST" class="occasionEnTete">
    <h1 class="occasionTitre"><?php echo $voiture["marque"]."-".$voiture["modèle"]."  <br/ class='phone_only'>  ".$voiture["Prix"]."€"?></h1>
        <input type="hidden" name="id" value="<?php echo $voiture["id"] ?>">
        <button class="boutton " type="submit" name="action" value="demandeRenseignement">Réserver</button>
    </form>

    <div class="occasionPlusContenu">
    <div class="caracteristiqueGlobal">
        <h2>Caractéristiques</h2>
        <div>
            <?php 
            $passer = 1;
            reset($voiture);
            while ($caracteristique = current($voiture)) {
                
                if($passer == 0){ 
                    if( key($voiture) == "options"){ 
                        end($voiture);
                    }else{
                    ?>
                    <div class="caracteristique">
                        <p><?php echo key($voiture) ?></p>
                        <?php if($caracteristique == 1){
                            echo '<p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>                         
                            </p>';

                        }elseif($caracteristique == 0){
                            echo '<p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>                        
                            </p>';
                        }else{
                            echo "<p>".$caracteristique."</p>";
                        } ?>
                    </div>
                    <?php 
                        }
                }   
                else{
                    if(key($voiture) == "caracteristiques"){
                        $passer = 0;
                    }
                }
                next($voiture);
            } ?>
        </div>
    </div>
    <div class="optionGlobales">
        <h2>Options</h2>
        <div>
            <?php 
            $passer = 1;
            reset($voiture);
            while ($caracteristique = current($voiture)) {
                if($passer == 0){ ?>
                    <div class="caracteristique">
                        <p><?php echo key($voiture) ?></p>
                        <?php if($caracteristique == 1){
                            echo '<p>
                            <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>                         
                            </p>';

                        }elseif($caracteristique == 0){
                            echo '<p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>                        
                            </p>';
                        }else{
                            echo "<p>".$caracteristique."</p>";
                        } ?>
                    </div>

                <?php }
                else{
                    if(key($voiture) == "options"){
                        $passer = 0;
                    }
                }
                next($voiture);
            } ?>
        </div>
    </div>
    </div>

        <form action="<?php echo BASE_URL;?>/reserver" method="POST" class="bouttonReserver">
            <input type="hidden" name="id" value="<?php echo $voiture["id"] ?>">
            <button class="boutton " type="submit" name="action" value="demandeRenseignement">Reserver</button>
            <p>Pour toute demande d'information suplémentaire, n'hésitez pas à nous contacter au 07 66 55 44 33 </p>
        </form>
            <?php 
            $sujet = "reservation voiture:".$voiture["id"]."|".$voiture["marque"]."-".$voiture["modèle"].
            require "views/formulaire.php"; ?>
           
    </div>
</div>
