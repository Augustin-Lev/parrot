<!DOCTYPE php>
<html>
    <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style\stylesheet.css">
        <title>Initialisation</title>
        <meta name= "description" content="
        Page de connexion
        ">
    </head>
    <body class="init">
    <?php
        // require "../model/Bdd.php";
        require '../view/bandeau.php';
        require "../model/sendcode.php";


    ?>
    <h1 style="background-color:black">Initialisation</h1>
    <?php 
    printForm();

    if(isset($_POST["action"])){
        if($_POST['action']=="stockInfos"){
            if(file_exists("../model/log.csv")){
                unlink('../model/log.csv');
            }else{
                $fichier = fopen("../model/log.csv", "w");
                fwrite($fichier, "UserDB,passwordDB,name,surname,email,password \r\n");
                fwrite($fichier, $_POST["UserDB"].",".$_POST["passwordDB"].",".$_POST["name"].",".$_POST["surname"].",".$_POST["email"].",".$_POST["password"] );
                initialisation($_POST["NameDB"],$_POST["UserDB"],$_POST["passwordDB"],$_POST["name"],$_POST["surname"],$_POST["email"],$_POST["password"],0);
            }
        }
        if($_POST['action']=="fillDB"){
            if(file_exists("../model/log.csv")){
                unlink('../model/log.csv');
            }else{
                $fichier = fopen("../model/log.csv", "w");
                fwrite($fichier, "NameDB,UserDB,passwordDB,name,surname,email,password \r\n");
                fwrite($fichier,$_POST["NameDB"].",".$_POST["UserDB"].",".$_POST["passwordDB"].",".$_POST["name"].",".$_POST["surname"].",".$_POST["email"].",".$_POST["password"] );
                initialisation($_POST["NameDB"],$_POST["UserDB"],$_POST["passwordDB"],$_POST["name"],$_POST["surname"],$_POST["email"],$_POST["password"],1);
            }
        }

    }

function printForm(){
    echo'
    
    <p>En vue de la bonne installation du site, nous vous demandons les information suivantes :<br/>
    - Si un bug persiste au niveau du téléchargement des images, reconfigurez le php.ini et augmentez "upload_max_filesize"</p>
    <form class="loginForm" action="init.php" method="POST">
        <label for="NameDB">Nom de la base de donnée</label>
        <input type="text" name="NameDB" value="u734868843_parrot" required="">

        <label for="UserDB">Utilisateur de la base de donnée</label>
        <input type="text" name="UserDB" value="u734868843_augustin" required="">

        <label for="passwordDB">Mot de passe de la base de donnée</label>
        <input type="text" name="passwordDB" value="4a:P:N6u:LKZ" required="">

        <label for="name">Nom</label>
        <input type="text" name="name" value="Vincent" required="">

        <label for="surname">Prénom</label>
        <input type="text" name="surname" value="Parrot" required="">

        <label for="email">Adresse mail</label>
        <input type="text" name="email" value="vp@garage.fr" required="">

        <label for="password">Mot de passe du site</label>
        <input type="text" name="password" value="mod" required="">

        <button class="boutton" type="submit" name="action" value="stockInfos" >initialisation</button>
        <button class="boutton" type="submit" name="action" value="fillDB" > remplissage de la base</button>
    </form>
    ';
}

function fillDB($NameDB,$UserDB,$passwordDB,$name,$surname,$email,$password){
 
    try {
        $PDO = new PDO('mysql:host=localhost;dbname='.$NameDB, $UserDB, $passwordDB);
    }catch(PDOExeption $e){
        echo '<li>Erreur lors de la connection à la base de donées</li>';
    }
    
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis ex, eum deleniti dicta corrupti culpa consectetur perferendis architecto veritatis exercitationem illum animi ducimus doloremque amet cum consequuntur consequatur iusto quia!';
    $sql ='INSERT INTO salaries (statut, nom, prenom, email, motDePasse) VALUES ( :statut, :nom, :prenom, :email, :motDePasse);';
        $pdoStatement= $PDO->prepare($sql);
        $pdoStatement->bindValue(':statut',"Gérant", PDO::PARAM_STR);
        $pdoStatement->bindValue(':nom',$name,PDO::PARAM_STR);
        $pdoStatement->bindValue(':prenom',$surname,PDO::PARAM_STR);
        $pdoStatement->bindValue(':email',$email,PDO::PARAM_STR);
        $pdoStatement->bindValue(':motDePasse',$password,PDO::PARAM_STR);
        if($pdoStatement -> execute()) { 
            echo "<li>témoignage 1 bien inscrit </li><br/>";                
        }else{
            echo "<li>ECHEC de l'inscription du témoignage 1 </li><br/>";
        }
        
    $sql ='INSERT INTO `temoignage` (id,parution,etoile,valide,nom,prenom,commentaire) VALUES (:id,:parution,:etoile,:valide,:nom,:prenom,:commentaire);';
        $pdoStatement = $PDO->prepare($sql);
        $pdoStatement->bindValue(':id', 1,PDO::PARAM_STR);
        $pdoStatement->bindValue(':parution', "10/08/2023",PDO::PARAM_STR);
        $pdoStatement->bindValue(':etoile', 4,PDO::PARAM_STR);
        $pdoStatement->bindValue(':valide', 1,PDO::PARAM_STR);
        $pdoStatement->bindValue(':nom', 'Monaco',PDO::PARAM_STR);
        $pdoStatement->bindValue(':prenom', 'Stephanie',PDO::PARAM_STR);
        $pdoStatement->bindValue(':commentaire', $lorem,PDO::PARAM_STR);
        if($pdoStatement -> execute()) { 
            echo "<li>témoignage 1 bien inscrit </li><br/>";                
        }else{
            echo "<li>ECHEC de l'inscription du témoignage 1 </li><br/>";
        }
        
    $sql ='INSERT INTO `temoignage` (id,parution,etoile,valide,nom,prenom,commentaire) VALUES (:id,:parution,:etoile,:valide,:nom,:prenom,:commentaire);';
        $pdoStatement = $PDO->prepare($sql);
        $pdoStatement->bindValue(':id', 2,PDO::PARAM_STR);
        $pdoStatement->bindValue(':parution', "10/08/2023",PDO::PARAM_STR);
        $pdoStatement->bindValue(':etoile', 3,PDO::PARAM_STR);
        $pdoStatement->bindValue(':valide', 1,PDO::PARAM_STR);
        $pdoStatement->bindValue(':nom', 'Lebon',PDO::PARAM_STR);
        $pdoStatement->bindValue(':prenom', 'Emmanuel',PDO::PARAM_STR);
        $pdoStatement->bindValue(':commentaire', "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, accusantium. Quidem obcaecati tempore harum distinctio, minus a, suscipit, esse consectetur rem qui officiis ex! Tempore maiores tempora error recusandae expedita.    ",PDO::PARAM_STR);
        if($pdoStatement -> execute()) { 
            echo "<li>témoignage 2 bien inscrit </li><br/>";                
        }else
        { 
            echo "<li>ECHEC de l'inscription du témoignage 2 </li><br/>";
        }

    $sql ='INSERT INTO `temoignage` (id,parution,etoile,valide,nom,prenom,commentaire) VALUES (:id,:parution,:etoile,:valide,:nom,:prenom,:commentaire);';
        $pdoStatement = $PDO->prepare($sql);
        $pdoStatement->bindValue(':id', 3,PDO::PARAM_STR);
        $pdoStatement->bindValue(':parution', "10/08/2023",PDO::PARAM_STR);
        $pdoStatement->bindValue(':etoile', 4,PDO::PARAM_STR);
        $pdoStatement->bindValue(':valide', 1,PDO::PARAM_STR);
        $pdoStatement->bindValue(':nom', 'Creig',PDO::PARAM_STR);
        $pdoStatement->bindValue(':prenom', 'Daniel',PDO::PARAM_STR);
        $pdoStatement->bindValue(':commentaire', "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, accusantium. Quidem obcaecati tempore harum distinctio, minus a, suscipit, esse consectetur rem qui officiis ex! Tempore maiores tempora error recusandae expedita.    ",PDO::PARAM_STR);
        if($pdoStatement -> execute()) { 
            echo "<li>témoignage 3 bien inscrit </li><br/>";                
        }else
        {
            echo "<li>ECHEC de l'inscription du témoignage 3 </li><br/>";
        }

    $sql ='INSERT INTO `temoignage` (id,parution,etoile,valide,nom,prenom,commentaire) VALUES (:id,:parution,:etoile,:valide,:nom,:prenom,:commentaire);';
        $pdoStatement = $PDO->prepare($sql);
        $pdoStatement->bindValue(':id', 4,PDO::PARAM_STR);
        $pdoStatement->bindValue(':parution', "10/08/2023",PDO::PARAM_STR);
        $pdoStatement->bindValue(':etoile', 4,PDO::PARAM_STR);
        $pdoStatement->bindValue(':valide', 0,PDO::PARAM_STR);
        $pdoStatement->bindValue(':nom', 'Monaco',PDO::PARAM_STR);
        $pdoStatement->bindValue(':prenom', 'Stephanie',PDO::PARAM_STR);
        $pdoStatement->bindValue(':commentaire', "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, accusantium. Quidem obcaecati tempore harum distinctio, minus a, suscipit, esse consectetur rem qui officiis ex! Tempore maiores tempora error recusandae expedita.    ",PDO::PARAM_STR);
        if($pdoStatement -> execute()) { 
            echo "<li>témoignage 4 bien inscrit </li><br/>";                
        }else
        {
            echo "<li>ECHEC de l'inscription du témoignage 4 </li><br/>";
        }
        
    $sql ='INSERT INTO `contenu` (id, services, contenu, modificateur, parution) VALUES (:id, :services, :contenu, :modificateur, :parution);';
        $pdoStatement = $PDO->prepare($sql);
        $pdoStatement->bindValue(':id', 1,PDO::PARAM_STR);
        $pdoStatement->bindValue(':services', 'carrosserie',PDO::PARAM_STR);
        $pdoStatement->bindValue(':contenu', $lorem,PDO::PARAM_STR);
        $pdoStatement->bindValue(':modificateur', $email,PDO::PARAM_STR);
        $pdoStatement->bindValue(':parution', "10/08/2023",PDO::PARAM_STR);
        if($pdoStatement -> execute()) { 
            echo "<li>carrosserie bien inscrit </li><br/>";                
        }else
        {
            echo "<li>ECHEC de l'inscription de la carrosserie </li><br/>";
        }

    $sql ='INSERT INTO `contenu` (id, services, contenu, modificateur, parution) VALUES (:id, :services, :contenu, :modificateur, :parution);';
        $pdoStatement = $PDO->prepare($sql);
        $pdoStatement->bindValue(':id', 2,PDO::PARAM_STR);
        $pdoStatement->bindValue(':services', 'mecanique',PDO::PARAM_STR);
        $pdoStatement->bindValue(':contenu', $lorem,PDO::PARAM_STR);
        $pdoStatement->bindValue(':modificateur',$email,PDO::PARAM_STR);
        $pdoStatement->bindValue(':parution', "10/08/2023",PDO::PARAM_STR);
        if($pdoStatement -> execute()) { 
            echo "<li>mecanique bien inscrit </li><br/>";                
        }else
        {
            echo "<li>ECHEC de l'inscription de la mecanique </li><br/>";
        }

    $sql ='INSERT INTO `contenu` (id, services, contenu, modificateur, parution) VALUES (:id, :services, :contenu, :modificateur, :parution);';
        $pdoStatement = $PDO->prepare($sql);
        $pdoStatement->bindValue(':id', 3,PDO::PARAM_STR);
        $pdoStatement->bindValue(':services', 'entretien',PDO::PARAM_STR);
        $pdoStatement->bindValue(':contenu', $lorem,PDO::PARAM_STR);
        $pdoStatement->bindValue(':modificateur',$email,PDO::PARAM_STR);
        $pdoStatement->bindValue(':parution', "10/08/2023",PDO::PARAM_STR);
        if($pdoStatement -> execute()) { 
            echo "<li>entretien bien inscrit </li><br/>";                
        }else
        {
            echo "<li>ECHEC de l'inscription de la entretien </li><br/>";
        }

    $sql ='INSERT INTO `horaire` (id, journee,lundi1,lundi2,mardi1,mardi2,mercredi1,mercredi2,jeudi1,jeudi2,vendredi1,vendredi2,samedi1,samedi2,dimanche1,dimanche2) VALUES (:id, :journee,:lundi1,:lundi2,:mardi1,:mardi2,:mercredi1,:mercredi2,:jeudi1,:jeudi2,:vendredi1,:vendredi2,:samedi1,:samedi2,:dimanche1,:dimanche2);';
        $pdoStatement = $PDO->prepare($sql);
        
        $pdoStatement->bindValue(':id', 1,PDO::PARAM_STR);
        $pdoStatement->bindValue(':journee','matin',PDO::PARAM_STR);
        $pdoStatement->bindValue(':lundi1',"08:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':lundi2',"11:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':mardi1',"08:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':mardi2',"11:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':mercredi1',"08:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':mercredi2',"11:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':jeudi1',"08:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':jeudi2',"11:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':vendredi1',"08:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':vendredi2',"11:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':samedi1',"08:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':samedi2',"11:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':dimanche1',"08:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':dimanche2',"11:00",PDO::PARAM_STR);
       
        if($pdoStatement -> execute()) { 
            echo "<li>horaire matin bien inscrit </li><br/>";                
        }else
        {
            echo "<li>ECHEC de l'inscription de l'horaire matin </li><br/>";
        }

        $sql ='INSERT INTO `horaire` (id, journee,lundi1,lundi2,mardi1,mardi2,mercredi1,mercredi2,jeudi1,jeudi2,vendredi1,vendredi2,samedi1,samedi2,dimanche1,dimanche2) VALUES (:id, :journee,:lundi1,:lundi2,:mardi1,:mardi2,:mercredi1,:mercredi2,:jeudi1,:jeudi2,:vendredi1,:vendredi2,:samedi1,:samedi2,:dimanche1,:dimanche2);';
        $pdoStatement = $PDO->prepare($sql);
        
        $pdoStatement->bindValue(':id', 2,PDO::PARAM_STR);
        $pdoStatement->bindValue(':journee','aprem',PDO::PARAM_STR);
        $pdoStatement->bindValue(':lundi1',"13:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':lundi2',"17:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':mardi1',"13:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':mardi2',"17:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':mercredi1',"13:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':mercredi2',"17:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':jeudi1',"13:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':jeudi2',"17:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':vendredi1',"13:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':vendredi2',"17:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':samedi1',"13:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':samedi2',"17:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':dimanche1',"13:00",PDO::PARAM_STR);
        $pdoStatement->bindValue(':dimanche2',"17:00",PDO::PARAM_STR);
       
        if($pdoStatement -> execute()) { 
            echo "<li>horaire aprem bien inscrit </li><br/>";                
        }else
        {
            echo "<li>ECHEC de l'inscription de l'horaire aprem </li><br/>";
        }

        $sql = "INSERT INTO occasion (id, modificateur, miseEnCirculation,imageClef,descriptions,caracteristiques,marque,modèle,Prix,kilométrage,options,galette_de_secours) 
        VALUES (1, 
        'jean',
        '2003',
        '1',
        'Je vends ma voiture pour acheter une familiale ! Et oui, notre famille grandit mais cette voiture était encore très bien',
        '1',
        'Renault',
        'Captur',
        '45 000',
        '140 000',
        '1',
        '1');";
        $pdoStatement = $PDO->prepare($sql);
        if($pdoStatement -> execute()) { 
            echo "<li>véhicule 1 bien inscrit </li><br/>";                
        }else
        {
            echo "<li>ECHEC de l'inscription du véhicule 1</li><br/>";
        }

        $sql = "INSERT INTO occasion (id, modificateur, miseEnCirculation,imageClef,descriptions,caracteristiques,marque,modèle,Prix,kilométrage,options,galette_de_secours) 
        VALUES (2, 
        'jean',
        '2003',
        '1',
        'Je vends ma voiture pour acheter une familiale ! Et oui, notre famille grandit mais cette voiture était encore très bien',
        '1',
        'Porsche',
        'Cayenne',
        '200 000',
        '60 000',
        '1',
        '0');";
        $pdoStatement = $PDO->prepare($sql);

        if($pdoStatement -> execute()) { 
            echo "<li>véhicule 2 bien inscrit </li><br/>";                
        }else
        {
            echo "<li>ECHEC de l'inscription du véhicule 2</li><br/>";
        }

}

function initialisation($NameDB,$UserDB,$passwordDB,$name,$surname,$email,$password,$fillDB){
    echo '<body>
        <h2 >Creation de la base de donnée</h2> 
        <div class="carte" style="margin: 5% 20% 0% 20%;">
        <h2>Action :</h2>
        <ul>';
    
    try {
        $PDO = new PDO('mysql:host=localhost', $UserDB, $passwordDB);
    }catch(PDOExeption $e){
        echo 'Erreur lors de la connection à la base de donées';
    }
    require "../model/Bdd.php";
    if ($PDO->exec('DROP DATABASE IF EXISTS '.$NameDB) !== false) {
        if ($PDO -> exec('CREATE DATABASE '.$NameDB) !==null){
            echo "<li>création de la base réussi !</li> <br/>";
            try{
                $tablePDO = new PDO('mysql:host=localhost;dbname='.$NameDB, $UserDB, $passwordDB);
                echo '<li>liaison à la base de donnée réussie</li><br/>';
            }catch(PDOExeption $e){
                echo '<li>echec de la liaison à la base de données</li><br/>';
            }
            if($tablePDO -> exec('CREATE TABLE salaries (
                id INT(11) PRIMARY KEY AUTO_INCREMENT,
                statut VARCHAR(100),
                nom VARCHAR(100),
                prenom VARCHAR(100),
                email VARCHAR (100),
                motDePasse VARCHAR (100))') !== null){
                    echo "<li>table Salarié créée</li><br/>";
            }else{
                    echo '<li>echec de création de la table Salarié</li><br/>';
            }
            if($tablePDO -> exec('CREATE TABLE temoignage (
                id INT(11) PRIMARY KEY AUTO_INCREMENT,
                parution VARCHAR(10),
                etoile int(5),
                valide int(1),
                nom VARCHAR(100),
                prenom VARCHAR(100),
                commentaire TEXT (1000))') !== null){
                    echo "<li>table témoignage créée</li><br/>";
            }else{
                    echo '<li>echec de création de la table témoignage</li><br/>';
            }
            if($tablePDO -> exec('CREATE TABLE contenu (
                id INT(11) PRIMARY KEY AUTO_INCREMENT,
                services VARCHAR(12),
                contenu TEXT(1000),
                modificateur VARCHAR(100),
                parution VARCHAR(100))') !== null){
                    echo "<li>table contenu créée</li><br/>";
            }else{
                    echo '<li>echec de création de la table contenu</li><br/>';
            }
            if($tablePDO -> exec('CREATE TABLE occasion (
                id INT(11) PRIMARY KEY AUTO_INCREMENT,
                modificateur VARCHAR (50),
                miseEnCirculation VARCHAR(100),
                imageClef VARCHAR(100),
                descriptions VARCHAR(10000),
                caracteristiques VARCHAR(10),
                marque VARCHAR(1000),
                modèle VARCHAR(100),
                Prix VARCHAR(100),
                kilométrage VARCHAR(100),
                options VARCHAR(10),
                galette_de_secours VARCHAR(10)
                   
                )') !== null){
                    echo "<li>table occasion créée</li><br/>";
            }else{
                    echo '<li>echec de création de la table occasion</li><br/>';
            }
            if($tablePDO -> exec('CREATE TABLE horaire (
                id INT(11) PRIMARY KEY AUTO_INCREMENT,
                journee VARCHAR(10),
                lundi1 VARCHAR(5),
                lundi2 VARCHAR(5),
                mardi1 VARCHAR(5),
                mardi2 VARCHAR(5),
                mercredi1 VARCHAR(5),
                mercredi2 VARCHAR(5),
                jeudi1 VARCHAR(5),
                jeudi2 VARCHAR(5),
                vendredi1 VARCHAR(5),
                vendredi2 VARCHAR(5),
                samedi1 VARCHAR(5),
                samedi2 VARCHAR(5),
                dimanche1 VARCHAR(5),
                dimanche2 VARCHAR(5))') !== null){
                    echo "<li>table horaire créée</li><br/>";
            }else{
                    echo '<li>echec de création de la horaire témoignage</li><br/>';
            }
        }else{
            echo '<li>echec de la création de la table</li><br/>';
        }
    }else{
        echo '<li>erreur de suppression de la table</li><br/>';
    }

    if($fillDB){
        fillDB($NameDB,$UserDB,$passwordDB,$name,$surname,$email,$password);
    }
    
    echo ' </ul>';
    if(isset($_POST["action"])==0){
        echo'
            <form action="" method=POST>
                <input name="action" value="fillBdd" style="display:none">
                <button type=submit class="boutton">Remplir la base de donnée</button>
            </form>';
    }
    echo '
    <a class="boutton" href="../controller/index.php"> Menu </a>
    </div>
    </body>';
}
  






