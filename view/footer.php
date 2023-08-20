<footer>
    <a  href="../controller/index.php">
        <img src="../image/logoBlack.png" alt="Logo Garrage Parrot">
    </a>
    <div>

        <div class="footerContainerGlobal">
            <div class=footerContainer>
                <a href="../controller/index.php#formulaire">Prendre rendez-vous</a>
                <a href="../controller/service.php#carrosserie">Réparation carroserie</a>
                
            </div>
            <div class=footerContainer>
                <a href="../controller/service.php#moteur">Mécanique</a>
                <a href="../controller/service.php#entretien">Entretien</a>
                <a href="../controller/index.php">Menu</a>
                
            </div>
            <div class=footerContainer>
                <a href="../controller/occasion.php">Véhicule d'occasion</a>
                <a href="../controller/temoignage.php">Témoignage</a>
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
        
        <?php $horaire =  getHoraires($PDO);
        // var_dump($horaire);
        foreach($horaire as $ligne){
            if($ligne["id"]== 1){
            echo ' <tr>';           
            reset($ligne);
            $i = 1;
            foreach($ligne as $valeur){
                if (key($ligne) != 'id' && key($ligne) != 'journee' ){
                    $i ++;
                    if (($i%2) == 0){
                       echo'<td>'.$valeur.' - ';
                    }
                    else{
                        echo $valeur.'</td>';
                    }
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
                if (key($ligne) != 'id' && key($ligne) != 'journee' ){
                    $i ++;
                    if (($i%2) == 0){
                       echo'<td>'.$valeur.' - ';
                    }
                    else{
                        echo $valeur.'</td>';
                    }
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

            <?php $horaire =  getHoraires($PDO);
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