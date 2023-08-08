<h1>Login</h1>
<form action="../controller/login.php?login=verif" method="POST">
    <label for="id">Identifiant</label>
    <input type="text" id="id" name="id">

    <label for="mpd">Mot de passe</label>
    <input type="text" id="mdp" name="mdp">

    <a href="../controller/login?login=forget ">mot de passe oublié ou inexistant</a>
    <a href="../controller/index.php">retour au site</a>

    <button type='submit'>Se connecter</button>
</form>