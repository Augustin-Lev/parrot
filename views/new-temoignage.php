<div class=login>
    <h1>Nouveau Témoignage</h1>
    <form class="loginForm" action="../controller/temoignage.php" method="post">
        
        <input style="display:none" name="action" id="action" value="enregistrer">
        <input type="text"  style="display:none;" name="valide" value ="<?php echo $_POST["valide"]; ?>">
       
        
        <label for="Nom">Nom</label>
        <input type="text" name="Nom" required="">

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" required="">

        <label for="Etoile">Etoiles</label>
        <input type="number" name="Etoile" required="" min="0" max="5">

        <label for="commentaire">Commentaire</label>
        <input type="text" name="commentaire" required="">


        <button class="boutton" type="submit">Envoyer</button>
        <a title="Retour vers le menu" href="../controller/index.php">Annuler</a>
    </form>
</div>