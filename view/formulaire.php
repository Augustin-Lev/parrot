    <div class="formulaire" id="formulaire">
        
        <div class="textFormulaire">
            <h2>Nous contacter</h2>
            <p>Pour toutes questions ou prises de rendez-vous, n'hésitez pas à remplir le formulaire suivant ou a nous contacter au : 07 55 44 11 33<br/>
            Rendez-vous au 1 Rue Luce Boyals, 31300 Toulouse ! 
            </p>
            <a 
                href="https://www.google.com/maps/dir//1+Rue+Luce+Boyals,+31300+Toulouse/@43.6037039,1.4042991,17z/data=!4m9!4m8!1m0!1m5!1m1!1s0x12aebae20ab1ac83:0x844aec64330bfe32!2m2!1d1.404778!2d43.60376!3e0?entry=ttu"
                class="boutton"
                target="_blank">Plan d'accès
            </a>
        </div>
        
        <form action="../controller/index.php" method="POST">
            <div class="formulaireMessage">
                <label for="message">Votre message</label>
                <input type="textarea" name="message" required="">
            </div>
            
            <div class="renseignement">
                <label for="nom">Nom</label>
                <input type="text" name="nom" required="">

                <label for="prenom">Prénom</label>
                <input type="text" name="prenom"  required="">

                <label for="mail">Email</label>
                <input type="mail" name="mail"  required="">

                <label for="tel">Téléphone</label>
                <input type="text" name="tel"  required="">

                <button class="boutton" type="submit">Envoyer</button>   

            </div>
        </form>
    </div>
