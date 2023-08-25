<h1 class="h1Occas">Occasions</h1>

<div class="filtreOccasion"  >
    <div>
        <p>
        <label for="prix">Prix:</label>
        <input type="text" id="prix" readonly style="border:0; color:#f6931f; font-weight:bold;">
        </p>
        
        <div id="sliderPrix"></div>
    </div>
    <div>
        <p>
        <label for="km">Kilométrage:</label>
        <input type="text" id="km" readonly style="border:0; color:#f6931f; font-weight:bold;">
        </p>
        
        <div id="sliderKm"></div>
    </div>
    <div>
        <p>
        <label for="annee">Année:</label>
        <input type="text" id="annee" readonly style="border:0; color:#f6931f; font-weight:bold;">
        </p>
        
        <div id="sliderAns"></div>
    </div>
</div>




<?php

foreach ($occasions as $voiture){?>
    <div class="occasionVoiture" id="<?php echo $voiture["id"] ?>" >
        <img src="views/image/occasion/<?php echo $voiture["id"] ?>/image1.jpg">
        <div class="occasionInfos">
            <h2 class="occasionTitre"><?php echo $voiture["marque"]."-".$voiture["modèle"]?></h2>
            <div>

                <p class="prix"><?php echo $voiture["Prix"] ?> € </p>
                
                <p class="annee"><?php echo $voiture["miseEnCirculation"] ?></p>
                
                <p class="km"><?php echo $voiture["kilométrage"] ?> km</p>
            </div>
            <div class="occasionBoutton">
                <a title="avoir plus d'informations" href="occasions.php?voiture=<?php echo $voiture["id"] ?>" class="boutton">Voir plus</a>
            </div>
        </div>
    </div>
    <script src="<?php echo BASE_URL;?>\views/script/filtreOccasions.js"></script>
<?php
}

?>

