<div class=login>
    <h1>Réinitialisation du mot de passe</h1>
    <form class="loginForm" action="../controller/login.php" method="POST">
        <input style="display:none" name="action" id="action" value="nouveau-mpd">

        <label for="mdp">Nouveau mot de passe</label>
        <input type="password" id="mdp" name="mdp" required="">

        <label for="confirm">Confirmation du mot de passe</label>
        <input type="password" id="confirm" name="confirm" required="">


        <p>Votre mot de passe doit contenir : <br/>
            - Une minuscule <br/>
            - Une majuscule<br/>
            - Un chiffre<br/>
            - Un charactère parmis les suivants : *#€&@+/<br/>
            - Un minimum de 8 charactère<br/>
        </p>

        <button class="boutton" type="submit">Envoyer</button>
        <a href="../controller/index.php">Annuler</a>

    </form>
</div>