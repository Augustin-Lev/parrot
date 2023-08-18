<!DOCTYPE php>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\link\style.css">
        <title>Initiation</title>
    </head>
    <?php 
    if (isset($_GET['admin'])){ 
        
        echo '<body>
            <h1 class="">Creation de la base de donnée</h1> 

            <div class="carte c-vert" style="margin: 5% 20% 0% 20%;">
            <h2>Action :</h2>
            <ul>';

        try {
            $PDO = new PDO('mysql:host=localhost', 'u734868843_augustin', '4a:P:N6u:LKZ');
        }catch(PDOExeption $e){
            echo 'Erreur lors de la connection à la base de donées';
        }

        require "../model/Bdd.php";

        if ($PDO->exec('DROP DATABASE IF EXISTS u734868843_Parrot') !== false) {
            if ($PDO -> exec('CREATE DATABASE u734868843_Parrot') !==null){
                echo "<li>création de la base réussi !</li> <br/>";
                try{
                    $tablePDO = new PDO('mysql:host=localhost;dbname=u734868843_Parrot', 'u734868843_augustin', '4a:P:N6u:LKZ');
                    echo '<li>liaison a la base de donnée réussie</li><br/>';
                }catch(PDOExeption $e){
                    echo '<li>echec de la liaison a la base de données</li><br/>';
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
                    descriptions TEXT(1000),
                    caracteristiques VARCHAR(10),
                    marque VARCHAR(1000),
                    model VARCHAR(100),
                    prix VARCHAR(100),
                    Kilometrage VARCHAR(100),
                    options VARCHAR(10),
                    galette_de_Secour VARCHAR(10)
                       
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
        
        if(isset($_POST["action"])){
            if($_POST["action"]=="fillBdd"){
                try {
                    $PDO = new PDO('mysql:host=localhost;dbname=u734868843_parrot', 'u734868843_augustin', '4a:P:N6u:LKZ');
                }catch(PDOExeption $e){
                    echo '<li>Erreur lors de la connection à la base de donées</li>';
                }
                
                $lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis ex, eum deleniti dicta corrupti culpa consectetur perferendis architecto veritatis exercitationem illum animi ducimus doloremque amet cum consequuntur consequatur iusto quia!';

                $sql ='INSERT INTO salaries (statut, nom, prenom, email, motDePasse) VALUES ( :statut, :nom, :prenom, :email, :motDePasse);';
                    $pdoStatement= $PDO->prepare($sql);
                    $pdoStatement->bindValue(':statut',"patron", PDO::PARAM_STR);
                    $pdoStatement->bindValue(':nom',"Parrot",PDO::PARAM_STR);
                    $pdoStatement->bindValue(':prenom',"Vincent",PDO::PARAM_STR);
                    $pdoStatement->bindValue(':email',"vp@garrage.fr",PDO::PARAM_STR);
                    $pdoStatement->bindValue(':motDePasse',"mod",PDO::PARAM_STR);

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
                    $pdoStatement->bindValue(':nom', 'Monaco',PDO::PARAM_STR);
                    $pdoStatement->bindValue(':prenom', 'Stephanie',PDO::PARAM_STR);
                    $pdoStatement->bindValue(':commentaire', "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, accusantium. Quidem obcaecati tempore harum distinctio, minus a, suscipit, esse consectetur rem qui officiis ex! Tempore maiores tempora error recusandae expedita.    ",PDO::PARAM_STR);
                    if($pdoStatement -> execute()) { 
                        echo "<li>témoignage 2 bien inscrit </li><br/>";                
                    }else
                    { echo "<li>ECHEC de l'inscription du témoignage 2 </li><br/>";
                    }
                $sql ='INSERT INTO `temoignage` (id,parution,etoile,valide,nom,prenom,commentaire) VALUES (:id,:parution,:etoile,:valide,:nom,:prenom,:commentaire);';
                    $pdoStatement = $PDO->prepare($sql);
                    $pdoStatement->bindValue(':id', 3,PDO::PARAM_STR);
                    $pdoStatement->bindValue(':parution', "10/08/2023",PDO::PARAM_STR);
                    $pdoStatement->bindValue(':etoile', 4,PDO::PARAM_STR);
                    $pdoStatement->bindValue(':valide', 1,PDO::PARAM_STR);
                    $pdoStatement->bindValue(':nom', 'Monaco',PDO::PARAM_STR);
                    $pdoStatement->bindValue(':prenom', 'Stephanie',PDO::PARAM_STR);
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
                    $pdoStatement->bindValue(':modificateur', "Daniel Creig",PDO::PARAM_STR);
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
                    $pdoStatement->bindValue(':modificateur', "Daniel Creig",PDO::PARAM_STR);
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
                    $pdoStatement->bindValue(':modificateur', "Daniel Creig",PDO::PARAM_STR);
                    $pdoStatement->bindValue(':parution', "10/08/2023",PDO::PARAM_STR);
                    if($pdoStatement -> execute()) { 
                        echo "<li>entretien bien inscrit </li><br/>";                
                    }else
                    {
                        echo "<li>ECHEC de l'inscription de la entretien </li><br/>";}

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


                    // $sql ='INSERT INTO `occasion` (id, modificateur, miseEnCirculation, imageClef, descriptions, caracteristiques, marque, model, prix, Kilometrage, options, galette_de_Secour) VALUES (:id, :modificateur, :miseEnCirculation, :imageClef, :descriptions, :caracteristiques, :marque, :model, :prix, :Kilometrage, :options, :galette_de_Secour);';
                    // $pdoStatement = $PDO->prepare($sql);
                    
                    // $pdoStatement->bindValue(':id', 1,PDO::PARAM_STR);             
                    // $pdoStatement->bindValue(':modificateur','administateur@gerome.com',PDO::PARAM_STR);
                    // $pdoStatement->bindValue(':miseEnCirculation','2000',PDO::PARAM_STR);
                    // $pdoStatement->bindValue(':imageClef','../image/occasion/voiture1.jpg',PDO::PARAM_STR);
                    // $pdoStatement->bindValue(':descriptions','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, id. Neque cumque non aperiam nulla porro unde enim, nesciunt quidem corrupti commodi veniam odio veritatis vitae, dicta aliquam suscipit quo.',PDO::PARAM_STR);
                    // $pdoStatement->bindValue(':caracteristiques','1',PDO::PARAM_STR);
                    // $pdoStatement->bindValue(':marque ','Porsch',PDO::PARAM_STR);
                    // $pdoStatement->bindValue(':model','Cayene',PDO::PARAM_STR);
                    // $pdoStatement->bindValue(':prix','400 000',PDO::PARAM_STR);
                    // $pdoStatement->bindValue(':Kilometrage','100 000',PDO::PARAM_STR);
                    // $pdoStatement->bindValue(':options','1',PDO::PARAM_STR);
                    // $pdoStatement->bindValue(':galette_de_Secour','1',PDO::PARAM_STR);

                    // if($pdoStatement -> execute()) { 
                    //     echo "<li>occasion bien inscrit </li><br/>";                
                    // }else
                    // {
                    //     echo "<li>ECHEC de l'inscription de occasion</li><br/>";
                    // }
            }
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
        <a href="../controller/index.php"> Menu </a>
        </div>
        </body>';

    }else{ 
   
        header("Location: ../controller/index.php"); 
        exit;
    }
    echo " </html>";
  






