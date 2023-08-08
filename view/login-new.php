<h1>Réinitialisation du mot de passe</h1>
<form action="../controller/login.php" method="POST">
    <input name="action" id="action" value="nouveau-mpd">

    <label for="mdp">Nouveau mot de passe</label>
    <input type="password" id="mdp" name="mdp">

    <label for="confirm">Confirmation du mot de passe</label>
    <input type="password" id="confirm" name="confirm">


    <p>Votre mot de passe doit contenir : <br/>
        - Une minuscule <br/>
        - Une majuscule<br/>
        - Un chiffre<br/>
        - Un charactère parmis les suivants : *#€&@+/<br/>
        - Un minimum de 8 charactère<br/>
    </p>

    <button type="submit">Envoyer</button>
    <a href="../controller/index.php">Annuler</a>

</form>