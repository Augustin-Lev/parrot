<h1>Occasions</h1>

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
        <img src=" <?php echo $voiture["imageClef"] ?> ">
        <div class="occasionInfos">
            <h2 class="occasionTitre"><?php echo $voiture["marque"]."-".$voiture["modèle"]?></h2>
            <div>
                <p>Prix</p>
                <p class="prix"><?php echo $voiture["Prix"] ?> €</p>
            </div>
            <div>
                <?php echo $voiture["descriptions"] ?>
            </div>
            <div>
                <p>année de mise en circulation</p>
                <p class="annee"><?php echo $voiture["miseEnCirculation"] ?></p>
            </div>
            <div>
                <p>Kilométrage</p>
                <p class="km"><?php echo $voiture["kilométrage"] ?> km</p>
            </div>
            <div class="occasionBoutton">
                <a href="../controller/occasion.php?voiture=<?php echo $voiture["id"] ?>" class="boutton">Voir plus</a>
            </div>
        </div>
    </div>
<?php
}

?>
