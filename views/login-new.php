<div class=login>
    <h1>Réinitialisation du mot de passe</h1>
    <form class="loginForm" id="newPassword" action="<?php echo BASE_URL;?>/nouveau/mot_de_passe" method="POST">
        <input style="display:none" name="action" id="action" value="nouveau-mpd">

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

        <button class="boutton" type="submit">Envoyer</button>
        <a title="Retour vers le menu" href="<?php echo BASE_URL;?>/">Annuler</a>

    </form>
</div>