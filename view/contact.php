<div class=login class="formulaire">

    
    <h2>Reserver un véhicule</h2>
    
          
    <form class="loginForm" action="../controller/occasion.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_POST["id"] ; ?>">
        <input style="display:none" name="action"  value="reserver">

            <label for="nom">Nom</label>
            <input type="text" name="nom" required="">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom"  required="">
            <label for="mail">Email</label>
            <input type="mail" name="mail"  required="">
            <label for="tel">Téléphone</label>
            <input type="text" name="tel"  required="">


        <p>Ce formulaire nous permettra de vous recontacter dès que possible.<br/>
        Si le véhicule n'est plus disponible nous vous le feront savoir également.<br/>
        Lors de l'envois de ce formulaire, le garrage atteste avoir pris connaissance de votre désir d'aquisition.<br/>
        Les documents necessaire à l'achat vous seront remit sous 48h.<br/>
        </p>

        <button class="boutton" type="submit">Envoyer</button>
        <a href="../controller/occasion.php">Annuler</a>

    </form>
</div>
    