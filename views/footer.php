<footer>
    <a  href="<?php echo BASE_URL;?>/">
        <img src="<?php echo BASE_URL;?>\views/image/logoBlack.webp" alt="Logo Garrage Parrot">
    </a>
    <div>

        <div class="footerContainerGlobal">
            <div class=footerContainer>
                <a href="<?php echo BASE_URL;?>/#formulaire">Prendre rendez-vous</a>
                <a href="<?php echo BASE_URL;?>/services#carrosserie">Réparation carroserie</a>
                
            </div>
            <div class=footerContainer>
                <a href="<?php echo BASE_URL;?>/services#moteur">Mécanique</a>
                <a href="<?php echo BASE_URL;?>/services#entretien">Entretien</a>
                <a href="<?php echo BASE_URL;?>/">Menu</a>
                
            </div>
            <div class=footerContainer>
                <a href="<?php echo BASE_URL;?>/occasions">Véhicule d'occasion</a>
                <a href="<?php echo BASE_URL;?>/temoignage">Témoignage</a>
            </div>
        </div>
        
        <div class="ligne"></div>

        <div class="horraires">
            <h3>Horaires</h3>
            <table class="horaireTableau">
                <thead>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                    <th>Samedi</th>
                    <th>Dimanche</th>
                </thead>
        
        <?php 

        $write =1;
        foreach($horaire as $ligne){
            if($ligne["id"]== 1){
            echo ' <tr>';           
            reset($ligne);
            $i = 1;
            foreach($ligne as $valeur){
                if (key($ligne) != 'id' && key($ligne) != 'journee' && $write){
                    $i ++;
                    if($valeur == "CLOSE"){
                        echo'<td>Fermé</td>';
                        $write = 0;
                        $i++;
                    }elseif (($i%2) == 0){
                       echo'<td>'.$valeur.' - ';
                    }
                    else{
                        echo $valeur.'</td>';
                    }
                }elseif($write == 0){
                    $write =1;
                }
            next($ligne);
           
            }
            echo ' </tr>';
            }
        }
        foreach($horaire as $ligne){
            if($ligne["id"]== 2){
            echo ' <tr>';           
            reset($ligne);
            $i = 1;
            foreach($ligne as $valeur){
                if (key($ligne) != 'id' && key($ligne) != 'journee' && $write ){
                    $i ++;
                    if($valeur == "CLOSE"){
                        echo'<td>Fermé</td>';
                        $write = 0;
                        $i++;
                    }elseif (($i%2) == 0){
                       echo'<td>'.$valeur.' - ';
                    }
                    else{
                        echo $valeur.'</td>';
                    }
                }elseif($write == 0){
                    $write =1;
                }
            next($ligne);
           
            }
            echo ' </tr>';
            }
        }

        ?>
            </table>
        </div>

        <div class="horrairesPhone phone-only">
            <h3>Horaires</h3>
            <table class="horaireTableau ">

            <?php
                $day = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
        
                $j = 0;
                // var_dump($horaire);

                $ligne = $horaire[0];
                $ligne2 =$horaire[1];
                reset($ligne);
                reset($ligne2);

                next($ligne);
                next($ligne);
                next($ligne2);
                next($ligne2);

                for ($jour = 0; $jour < 7; $jour++){
                    echo '<tr>'; 
                    echo'<th>'.$day[$jour].'</th>';

                    $valeur = current($ligne);
                    echo'<td>'.$valeur.' - ';

                    next($ligne);
                    $valeur = current($ligne);
                    echo $valeur.'</td>';

                    next($ligne);
                    $valeur = current($ligne2);
                    echo'<td>'.$valeur.' - ';
                
                    next($ligne2);
                    $valeur = current($ligne2);
                    echo $valeur.'</td>';
                    echo '</tr>';
                    next($ligne2);
                }

            ?>

            </table>
        </div>
        
    </div>
      
</footer>
<a class="politiqueLien" href="<?php echo BASE_URL;?>/politique">Politique de confidentialité</a>