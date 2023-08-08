<h1>Mot de passe oublié</h1>
<form action="../controller/login.php" method="POST">
    <input name="action" id="action" value="envoyer">

    <label for="mail">Adresse mail</label>
    <input type="text" id="mail" name="mail">

    <p>Un code valable pendant 1 heure va vous être envoyé à votre adresse mail</p>

    <button type="submit">Envoyer</button>
    <a href="../controller/index.php">Annuler</a>

</form>