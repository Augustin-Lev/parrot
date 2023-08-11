<div class=login>
    <h1>Mot de passe oublié</h1>
    <form  class="loginForm" action="../controller/login.php" method="POST">
        <input style="display:none" name="action" id="action" value="envoyer">

        <label for="mail">Adresse mail</label>
        <input type="text" id="mail" name="mail" required="">

        <p>Un code valable pendant 1 heure va vous être envoyé à votre adresse mail</p>

        <button class="boutton" type="submit">Envoyer</button>
        <a href="../controller/index.php">Annuler</a>

    </form>
</div>