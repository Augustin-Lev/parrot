<div style="background-color:white">

<?php if ($_SESSION["statut"] == "patron"){?>
    <form class="headerAdmin" action='../controller/administration.php' method=POST>
        <a class="boutton" href="../model/init.php?admin=au">Reinitialiser la Base</a>
        <button class="boutton" name="action" value="new-salarie">Nouvel employé</button>
    </form>
<?php } ?>

<div>
    <h2>Que souhaitez-vous modifier ?</h2>
    <div class= troisServices>
        <a href="../controller/modifService.php?service=carrosserie">
            <svg width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <clipPath id="clip-0">
                    <path d="M 4 9 C 4 9.77 3.167 10.251 2.5 9.866 C 2.191 9.688 2 9.357 2 9 C 2 8.23 2.834 7.749 3.5 8.134 C 3.81 8.313 4 8.643 4 9 Z M 14 9 C 14 9.77 13.167 10.251 12.5 9.866 C 12.191 9.688 12 9.357 12 9 C 12 8.23 12.834 7.749 13.5 8.134 C 13.81 8.313 14 8.643 14 9 Z M 6 8 C 5.23 8 4.749 8.834 5.134 9.5 C 5.313 9.81 5.643 10 6 10 L 10 10 C 10.77 10 11.251 9.167 10.866 8.5 C 10.688 8.191 10.358 8 10 8 L 6 8 Z M 4.862 4.276 L 3.906 6.19 C 3.735 6.543 4.01 6.95 4.402 6.921 C 4.402 6.921 4.403 6.921 4.403 6.921 C 5.313 6.848 6.753 6.751 8 6.751 C 9.247 6.751 10.688 6.848 11.597 6.921 C 11.989 6.95 12.265 6.545 12.095 6.191 C 12.095 6.191 12.094 6.191 12.094 6.19 L 11.138 4.277 C 11.054 4.108 10.881 4 10.691 4 L 5.309 4 C 5.12 4 4.947 4.107 4.862 4.276 Z" style="transform-box: fill-box; transform-origin: 50% 50%;"/>
                    </clipPath>
                    <clipPath id="clip-1">
                    <path d="M 3.998 9.003 C 3.998 9.773 3.165 10.254 2.498 9.869 C 2.189 9.69 1.998 9.36 1.998 9.003 C 1.998 8.233 2.831 7.752 3.498 8.137 C 3.807 8.316 3.998 8.646 3.998 9.003 Z M 13.998 9.003 C 13.998 9.773 13.165 10.254 12.498 9.869 C 12.189 9.69 11.998 9.36 11.998 9.003 C 11.998 8.233 12.831 7.752 13.498 8.137 C 13.807 8.316 13.998 8.646 13.998 9.003 Z M 5.998 8.003 C 5.228 8.003 4.747 8.836 5.132 9.503 C 5.311 9.812 5.641 10.003 5.998 10.003 L 9.998 10.003 C 10.768 10.003 11.249 9.17 10.864 8.503 C 10.685 8.194 10.355 8.003 9.998 8.003 L 5.998 8.003 Z M 4.86 4.279 L 3.904 6.193 C 3.733 6.546 4.008 6.953 4.4 6.924 C 4.4 6.924 4.401 6.924 4.401 6.924 C 5.311 6.851 6.751 6.754 7.998 6.754 C 9.245 6.754 10.686 6.851 11.595 6.924 C 11.986 6.953 12.263 6.548 12.092 6.194 C 12.092 6.194 12.092 6.193 12.092 6.193 L 11.136 4.28 C 11.051 4.111 10.878 4.003 10.689 4.003 L 5.307 4.003 C 5.118 4.003 4.945 4.11 4.86 4.279 Z" style="transform-box: fill-box; transform-origin: 50% 50%;"/>
                    </clipPath>
                </defs>
                <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z" style="fill: rgb(0, 0, 0);"/>
                <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z" style="fill: rgb(0, 0, 0);"/>
                <rect x="0.718" y="3.484" width="14.086" height="3.974" style="stroke: rgb(0, 0, 0); clip-path: url(#clip-0); fill: rgb(255, 145, 0); isolation: isolate; mix-blend-mode: saturation;"/>
                <rect x="4.694" y="7.791" width="6.604" height="3.779" style="stroke: rgb(0, 0, 0); paint-order: stroke; clip-path: url(#clip-1); fill: rgb(255, 145, 0);"/>
            </svg>
        </a>
        <a href="../controller/modifService.php?service=mecanique">
            <svg width="16" height="16" fill="currentColor" class="bi bi-wrench-adjustable" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <rect x="10.742" y="-4.249" width="2.518" height="3.35" style="stroke: rgb(0, 0, 0); paint-order: stroke; fill-rule: nonzero; fill: rgb(255, 145, 0); transform-box: fill-box; transform-origin: 50% 50%;" transform="matrix(0.939693, -0.34202, -0.34202, -0.939693, -2.517996, 8.498002)"/>
            <path d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" style="fill: rgb(255, 145, 0);"/>
            <path d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" style="fill: rgb(0, 0, 0);"/>
            </svg>
        </a>
        <a href="../controller/modifService.php?service=entretien">
            <svg width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" style="fill: rgb(0, 0, 0);"/>
            <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" style="fill: rgb(0, 0, 0);"/>
            <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z" style="fill: rgb(255, 145, 0);"/>
            </svg>
        </a>
    </div>
</div>

<form>
    <h2>Horraires</h2>
    <table class="horrairesModif">
        <thead>
            <th></th>
            <th></th>
            <th>Matin</th>
            <th></th>
            <th></th>
            <th>Après-midi</th>
        </thead>
        <tr>
            <th>Lundi</th>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>      
        </tr>
        <tr>
            <th>Mardi</th>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>      
        </tr>
        <tr>
            <th>Mercredi</th>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>      
        </tr>
        <tr>
            <th>Jeudi</th>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>      
        </tr>
        <tr>
            <th>Vendredi</th>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>      
        </tr>
        <tr>
            <th>Samedi</th>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>      
        </tr>
        <tr>
            <th>Dimanche</th>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>
            <td><input type=time></td>
            <td class="accent">à</td>
            <td><input type=time></td>      
        </tr>

    </table>
    <button class="boutton bouttonHorraire" type="submit">Changer</button>
</form>

<div>
    <h2>Témoignage</h2>
    <div class="headerAdmin">
        <a class="boutton">Ajouter un nouveau Témoignage</a>
    </div>
    

    <h3>En attentes</h3>
    <div>
        <?php 
       
        foreach($Commentaires as $commentaire){
            if ($commentaire["valide"] == 0){ ?>
            <div class=temoignage>
                <div class=enTete>
                    <div> 
                        <?php 
                        $nbStar = $commentaire["etoile"];
                        for ($j = 0; $j<$nbStar; $j++ ){ ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(255, 145, 0)" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                           
                        <?php }
                        for ($j = 0; $j< (5-$nbStar); $j++ ){ ?>
                            <svg viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg " width="16" height="16">
                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" style="fill: rgb(255, 145, 0);" transform="matrix(1, 0, 0, 1, 2.220446049250313e-16, 2.220446049250313e-16)"/>
                            </svg>  
                        <?php } ?>
                        
                    </div>

                    <div>
                        le <?php echo $commentaire["parution"]; ?> 
                    </div>
                    <div>
                        <p> <?php echo $commentaire["nom"]." ".$commentaire["prenom"]; ?> </p> 
                    </div>

                </div> 
                <div class=corpsCommentaire>
                    <div class="temoignageMessage">
                        <p ><?php echo $commentaire["commentaire"]; ?> </p>
                    </div>

                    <div class=validation>
                        <a class="boutton" href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                        </a>
                        <a class="boutton" href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </div>
                </div> 

            </div>
        <?php }}?>
        
    </div>
    
    <h3>Déjà validés</h3>
    <form>
        <select name="stillValidate" id="CommStillValidate">
        <option value="">--Choisissez un commentaire--</option>
        
            <?php foreach($Commentaires as $commentaire){
                if ($commentaire["valide"] == 1){ ?>
                <option value=<?php echo $commentaire["id"]; ?>><?php echo $commentaire["parution"]." ".$commentaire["prenom"]." ".$commentaire["nom"]; ?></option>
            <?php } }?>
        </select>
        <button class="boutton" type=submit name='action' value='supprimer' >Supprimer</button>
        <button class="boutton" type=submit name='action' value='attente'>Mettre en attente</button>
    </form>
</div>
<div>
    <h2>Gestion des voitures d'occasion</h2>
    <form class="headerAdmin" action='../controller/administration.php' method=POST>
        <button class="boutton" name="action" value="new-occasion">Nouvel occasion</button>
    </form>
    <form>
        <select name="stillValidate" id="CommStillValidate">
        <option value="">--Choisissez un véhicule--</option>
        
            <?php foreach($occasions as $occasion){
                ?>
                <option value=<?php echo $occasion["id"]; ?>><?php echo $occasion["id"]." ".$occasion["marque"]." ".$occasion["model"]; ?></option>
            <?php } ?>
        </select>
        <button class="boutton" type=submit name='action' value='supprimer' >Supprimer</button>
        <button class="boutton" type=submit name='action' value='attente'>Modifier</button>     
    </form>

</div>


</div>