<?php

session_start();
include('db_cand.php');

	if(isset($_POST['submit'])){

// Récupérer les valeurs sélectionnées dans la liste déroulante
$languages = $_POST['language'];
$fname= $_POST['fname'];
$rec="SELECT * from cv where fname=:fname LIMIT 1";
$prep=$conn->prepare($rec);
$tab=[
    ':fname'=>$fname,
];

     $prep->execute($tab);

     $result = $prep->fetchAll();
     foreach($result as $row){
      $ido=$row['id'];
     }

// Parcourir les éléments du tableau "language[]" et insérer chaque élément dans la table de base de données
foreach ($languages as $language) {
  $query = "INSERT INTO languages (nom_lang,	id_cv) VALUES ('$language','$ido')";
  $query_run = $conn->prepare($query);


  
  $query_execute = $query_run->execute();
}

//   ******************************FRAMES*****************************


// Récupérer les valeurs sélectionnées dans la liste déroulante
$frameworks = $_POST['frameworks'];



// Parcourir les éléments du tableau "language[]" et insérer chaque élément dans la table de base de données
foreach ($frameworks as $framework) {
  $query = "INSERT INTO frameworks (nom_frame,	id_cv) VALUES ('$framework','$ido')";
  $query_run = $conn->prepare($query);

  $query_execute = $query_run->execute();
}
    
        if($query_execute){
    
            $_SESSION['message'] = "inserted successfully";
            header('Location: login_candidat.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Not inserted";
            header('Location: signup_candidat_lang.php');
            exit(0);
        }

    
    
}
?>