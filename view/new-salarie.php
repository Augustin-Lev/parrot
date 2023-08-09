<form class="new_employee" action="../controller/administration.php" method=POST>

    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom">
    </div>

    <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom">
    </div>
   
    <div>
        <label for="email">Adresse Mail</label>
        <input type="text" name="email">
    </div>

    <div>
        <label for="mdp">Mot de Passe</label>
        <input type="password" name="mdp">
    </div>

    <input style="display:none" type="text" name="action" value="ajout-new-employe">

    <button class="boutton" type="submit">Ajouter</button>
</form>