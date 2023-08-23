<div class="slider">
<input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav"/>

<?php //var_dump($voiture["imageClef"]);
for( $i=1; $i< $voiture["imageClef"];$i++){?>
        <input type="radio" name="slider" title="slide<?php echo $i+1; ?>" for="slide<?php echo $i+1; ?>" class="slider__nav"/>
<?php }?>
    <div class="slider__inner" style="width:<?php echo $voiture["imageClef"]; ?>00%;">
        <?php for( $i=1; $i<(intval($voiture["imageClef"])+1);$i++){ ?>
            <div class="slider__contents">
            <img class="slider__txt" src="../image/occasion/<?php echo $voiture["id"] ?>/image<?php echo $i; ?>.jpg">
            </div>
        <?php }?>
    </div>
</div>


<div class="occasionPlus">

    <form action="../controller/occasion.php" method="POST" class="occasionEnTete">
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
                        <p><?php echo $caracteristique ?></p>
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
                        <p><?php echo $caracteristique ?></p>
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

        <form action="../controller/occasion.php" method="POST" class="bouttonReserver">
            <input type="hidden" name="id" value="<?php echo $voiture["id"] ?>">
            <button class="boutton " type="submit" name="action" value="demandeRenseignement">Reserver</button>
            <p>Pour toute demande d'information suplémentaire, n'hésitez pas à nous contacter au 07 66 55 44 33 </p>
        </form>
        
            <?php 
            $sujet = "reservation voiture:".$voiture["id"]."|".$voiture["marque"]."-".$voiture["modèle"].
            require "../view/formulaire.php"; ?>
    

      
       
    </div>
</div>
