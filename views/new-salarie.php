<div class=login>
    <h1>Nouvel employé</h1>
    <form class="loginForm" id="newPassword" action="<?php echo BASE_URL;?>\ajout\employee" method=POST>

       
        <label for="nom">Nom</label>
        <input type="text" name="nom" required="">
    
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" required="">
    
        <label for="email">Adresse Mail</label>
        <input type="text" name="email" required="">

        <label for="mdp">Nouveau mot de passe</label>
        <input type="password" id="mdp" name="mdp" required="">
       
        <label for="confirm">Confirmation du mot de passe</label>
        <input type="password" id="confirm" name="confirm" required="">
      
        <p id="indiceMDP"></p>
        <p id="erreur">ERREUR, le mot de passe ne respecte pas les consignes ou n'est pas identique</p>
        <p class="descritptionMDP">Votre mot de passe doit contenir : <br/>
            - Une minuscule <br/>
            - Une majuscule<br/>
            - Un chiffre<br/>
            - Un charactère spéciale (*#€&@+/...)<br/>
            - Un minimum de 8 charactère<br/>
        </p>

        <input style="display:none" type="text" name="action" value="ajout-new-employe">

        <button class="boutton" type="submit">Ajouter</button>
        <a title="Retour vers le panneau d'administration" href="<?php echo BASE_URL;?>\administration">Retour</a>
    </form>
</div>
