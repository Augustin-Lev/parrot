<div class=login>
    <h1>Nouveau Champ</h1>
    <h2>
    
    <?php 
    // var_dump($_GET);

    if($_GET["action"] == "newCaracteristique"){
            $champ = "caracteristiques";
            echo 'Caractéristique';
        }
        else{
            $champ = "options";
            echo 'Option';
        }?>
    </h2>
    
    <form class="loginForm" action="../controller/administration.php" method="POST">
        <input style="display:none" name="action" value="ajouterChamp">
        <input style="display:none" name="champ" value="<?php echo $champ; ?>">

        <label for="name">Nom du champ </label>
        <input type="text" name="name" required="">

        <button class="boutton" type="submit">Envoyer</button>
        <a href="../controller/administration.php">Annuler</a>

    </form>
</div>