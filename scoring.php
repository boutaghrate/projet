<?php

include('db_cand.php');

$name = $_SESSION['namess'];
$password = $_SESSION['password'];


$query ="SELECT  * FROM candidats where nom_cand=:name AND mdps_cand=:password LIMIT 1" ; // Utilisation de placeholders pour éviter les injections SQL
$statement = $conn->prepare($query);
$statement->execute(['name' => $name, 'password' => $password]); // Passer les valeurs pour les placeholders

$result = $statement->fetchAll();
if($result)
{
    
    foreach($result as $row){
       $id=$row['id'];
    }
}

$requette="SELECT * from candidats where id=:id LIMIT 1";
$state = $conn->prepare($requette);
$state->execute(['id' => $id]); // Ajout de la valeur id récupérée dans la première requête
$resultat = $state->fetchAll();


//*************************************** Languages *************************

$query = "SELECT languages.nom_lang FROM languages 
          JOIN cv ON languages.id_cv = cv.id 
          JOIN candidats ON cv.id_cand = candidats.id 
          WHERE candidats.id = :id"; 

$statement = $conn->prepare($query);
$statement->execute(['id' => $id]); 
$lang = $statement->fetchAll(PDO::FETCH_ASSOC);
//*************************************** FRAMEWORKS *************************

$query = "SELECT frameworks.nom_frame FROM frameworks 
          JOIN cv ON frameworks.id_cv = cv.id 
          JOIN candidats ON cv.id_cand = candidats.id 
          WHERE candidats.id = :id"; 

$statement = $conn->prepare($query);
$statement->execute(['id' => $id]); 
$frame = $statement->fetchAll(PDO::FETCH_ASSOC);
 

    foreach($resultat as $line){
       $niveau_etude=$line['niveau_etude'];
       $profil=$line['profil'];
       $experience=$line['experience'];
    }
    
    // calcul niveau d etude ****************

    $note1=0;
    if($niveau_etude=='BAC'){
        $note1=1;
    }
    elseif($niveau_etude=='BAC+2'){
        $note1=2;
    }
    elseif($niveau_etude=='BAC+3'){
        $note1=3;
    }
    elseif($niveau_etude=='BAC+5'){
        $note1=4;
    }
    elseif($niveau_etude=='BAC+7'){
        $note1=6;
    }

    $note2=0;
    //calcul profil 
    if($profil=='Non-definie'){
        $note2=1;
    }
    elseif($profil=='etudiant'){
        $note2=2;
    }
    elseif($profil=='technicien'){
        $note2=3;
    }
    elseif($profil=='technicien-specialise'){
        $note2=4;
    }
    elseif($profil=='licensie'){
        $note2=5;
    }
    elseif($profil=='master'){
        $note2=6;
    }
    elseif($profil=='ingenieur'){
        $note2=7;
    }
    $note3=0;

    //calcul experience 
    if($experience=='non'){
        $note3=0;
    }
    elseif($experience=='Non-demande'){
        $note3=0;
    }
    elseif($experience=='Debutant'){
        $note3=2;
    }
    elseif($experience=='Junior'){
        $note3=4;
    }
    elseif($experience=='Senior'){
        $note3=6;
    }
    // calcul langage   
$note4=0;

foreach($lang as $key){
        if($key['nom_lang']=='HTML'){
        $note4+=1;
    }
    elseif($key['nom_lang']=='CSS'){
        $note4+=1;
    }
    elseif($key['nom_lang']=='JAVASCRIPT'){
        $note4+=3;
    }
    elseif($key['nom_lang']=='PHP'){
        $note4+=4;
    }
    elseif($key['nom_lang']=='PYTHON'){
        $note4+=4;
    }
    elseif($key['nom_lang']=='JAVA'){
        $note4+=4;
    }
    elseif($key['nom_lang']=='RUBY'){
        $note4+=3;
    }
    elseif($key['nom_lang']=='C++'){
        $note4+=3;
    }

}

$note5=0;

foreach($frame as $key){
    if($key['nom_frame']=='BOOTSTRAP'){
    $note5+=1;
}
elseif($key['nom_frame']=='JQUERY'){
    $note5+=1;
}
elseif($key['nom_frame']=='NODE'){
    $note5+=3;
}
elseif($key['nom_frame']=='LARAVEL'){
    $note5+=4;
}
elseif($key['nom_frame']=='AJAX'){
    $note5+=4;
}
elseif($key['nom_frame']=='JAVA'){
    $note5+=4;
}
elseif($key['nom_frame']=='RUBY'){
    $note5+=3;
}
elseif($key['nom_frame']=='C++'){
    $note5+=3;
}
}

   
$score=0;
$score=$note1+ $note2+$note3+$note4+$note5;

echo $score .'<br>';

// ******************Insertion de score dans la base de données ****************
$query ="UPDATE candidats SET score=:score WHERE id=:id";
$query_run = $conn->prepare($query);

$data = [
    ':score' => $score,
    ':id' => $id
];

$query_execute = $query_run->execute($data);
?>
