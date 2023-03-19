<?php

session_start();
include('db_cand.php');

$id_cand=$_SESSION['id_candidat_postuler'];
$id_offre=$_GET['id_offre'];

$rec="INSERT into candidatures (id_cand,	id_offre) VALUE (:id_cand,	:id_offre)";
$statement = $conn->prepare($rec);
$tab=[
    ':id_cand'=>$id_cand,
    ':id_offre'=>$id_offre,
];
$statement->execute($tab);

$_SESSION['postuler']='votre Candidatures est bien ajouté';

header('Location: interfaceCandidat.php');



?>