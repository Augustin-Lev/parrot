<h1>Occasions</h1>
<?php

foreach ($occasions as $voiture){?>
    <div class="occasionVoiture">
        <img src=" <?php echo $voiture["imageClef"] ?> ">
        <div class="occasionInfos">
            <h2 class="occasionTitre"><?php echo $voiture["marque"]."-".$voiture["model"]?></h2>
            <div>
                <p>prix</p>
                <p><?php echo $voiture["prix"] ?> €</p>
            </div>
            <div>
                <?php echo $voiture["descriptions"] ?>
            </div>
            <div>
                <p>année de mise en circulation</p>
                <p><?php echo $voiture["miseEnCirculation"] ?></p>
            </div>
            <div>
                <p>Kilométrage</p>
                <p><?php echo $voiture["Kilometrage"] ?> km</p>
            </div>
            <div class="occasionBoutton">
                <a href="../controller/occasion.php?voiture=<?php echo $voiture["id"] ?>" class="boutton">Voire plus</a>
            </div>
        </div>
    </div>
<?php
}

?>
