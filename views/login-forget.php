<div class=login>
    <h1>Mot de passe oublié</h1>
    <form  class="loginForm" action="<?php echo BASE_URL;?>/envoyerCode" method="POST">
        <input style="display:none" name="action" id="action" value="envoyer">

        <label for="mail">Adresse mail</label>
        <input type="text" id="mail" name="mail" required="">

        <p>Un code valable pendant 1 heure va vous être envoyé à votre adresse mail</p>

        <button class="boutton" type="submit">Envoyer</button>
        <a title="Retour au menu" href="<?php echo BASE_URL;?>/">Annuler</a>

    </form>
</div>