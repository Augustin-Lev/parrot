<div class=login>
    <h1>Login</h1>

    <form class="loginForm" action="../controller/login.php?login=verif" method="POST">
        <label for="id">Identifiant</label>
        <input type="text" id="id" name="id" required="">

        <label for="mpd">Mot de passe</label>
        <input type="password" id="mdp" name="mdp" required="">

        <a title="créer un nouveau mot de passe" href="../controller/login?login=forget ">mot de passe oublié ou inexistant</a>
        <a title="Retour vers le menu"href="../controller/index.php">retour au site</a>

        <button class="boutton" type='submit'>Se connecter</button>
    </form>

</div>
