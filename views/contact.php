<div class=login class="formulaire">

    
    <h1>Reserver un véhicule</h1>
    
          
    <form class="loginForm" action="<?php echo BASE_URL;?>/reserver" method="POST">
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
        Si le véhicule n'est plus disponible nous vous le ferons savoir également.<br/>
        Lors de l'envoi de ce formulaire, le garage atteste avoir pris connaissance de votre désir d'acquisition.<br/>
        Les documents nécessaires à l'achat vous seront remit sous 48h.<br/>
        </p>

        <button class="boutton" type="submit">Envoyer</button>
        <a title="Retour vers le menu occasion" href="<?php echo BASE_URL;?>/occasions/<?php echo $_POST["id"] ; ?>">Annuler</a>

    </form>
</div>
    