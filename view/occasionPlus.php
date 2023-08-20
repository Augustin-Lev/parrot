
<div class="occasionPlus">
    <form action="../controller/occasion.php" method="POST" class="occasionEnTete">
        <img src=" <?php echo $voiture["imageClef"] ?> ">
        <h2 class="occasionTitre"><?php echo $voiture["marque"]."-".$voiture["modèle"]."  <br/ class='phone_only'>  ".$voiture["Prix"]."€"?></h2>
        
        <input type="hidden" name="id" value="<?php echo $voiture["id"] ?>">
        <button class="boutton " type="submit" name="action" value="demandeRenseignement">Réserver</button>
    </form>
  
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
        <form action="../controller/occasion.php" method="POST" class="bouttonReserver">
            <input type="hidden" name="id" value="<?php echo $voiture["id"] ?>">
            <button class="boutton " type="submit" name="action" value="demandeRenseignement">Reserver</button>
            <p>Pour toute demande d'information suplémentaire, n'hésitez pas à nous contacter au 07 66 55 44 33 </p>
        </form>
        
        <div class="formulaire" id="formulaire">
        <div>
            <h2>Nous contacter</h2>
            <p>Pour toutes questions ou prises de rendez-vous, n'hésitez pas à remplir le formulaire suivant ou a nous contacter au : 07 55 44 11 33</p>
        </div>
        
        <form action="../controller/index.php" method="POST">
            <div class="formulaireMessage">
                <label for="message">Votre message</label>
                <input type="textarea" name="message" required="">
            </div>
            
            <div class="renseignement">
                <label for="nom">Nom</label>
                <input type="text" name="nom" required="">

                <label for="prenom">Prénom</label>
                <input type="text" name="prenom"  required="">

                <label for="mail">Email</label>
                <input type="mail" name="mail"  required="">

                <label for="tel">Téléphone</label>
                <input type="text" name="tel"  required="">

                <button class="boutton" type="submit">Envoyer</button>   

            </div>
        </form>
    </div>

      
       
    </div>
</div>
