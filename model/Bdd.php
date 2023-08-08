<?php

try {
    $PDO = new PDO('mysql:host=localhost;dbname=u734868843_parrot', 'u734868843_augustin', '4a:P:N6u:LKZ');
}catch(PDOExeption $e){
    echo 'Erreur lors de la connection à la base de donées';
}


function VerifierMdpBdd($PDO,$email,$motDePasse){
    foreach ($PDO-> query('SELECT email, motDePasse, nom, prenom, statu FROM salaries', PDO::FETCH_ASSOC) as $user){
        //var_dump($user);
        if ($user['email'] === $email &&
            $user['motDePasse'] === $motDePasse){
            
            return $user;
        }
    }
    return 0;
}
