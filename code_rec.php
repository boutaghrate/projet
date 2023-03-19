<?php
session_start();
include('db_rec.php');

if(isset($_POST['delete_rec'])){

    $id = $_POST['delete_rec'];

    try {
        
        $query ="DELETE FROM recruteurs WHERE id=:id";
        $statement = $conn->prepare($query);
        $data = [':id'=> $id ];

        $query_execute=$statement->execute($data);

        if($query_execute){
            $_SESSION['message'] = "Deleted successfully";
            header('Location: dashboard.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Not Deleted";
            header('Location: dashboard.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

if(isset($_POST['btn-update-rec'])){
    $id = $_POST['id'];
    $nom_rec=$_POST['nom_rec'];
    $prenom_rec=$_POST['prenom_rec'];
    $nom_entrep=$_POST['nom_entrep'];
    $adresse_entrep=$_POST['adresse_entrep'];
    $site_entrep=$_POST['site_entrep'];
    $ville_rec=$_POST['ville_rec'];
    $gmail_rec=$_POST['gmail_rec'];
    $mdps_rec=$_POST['mdps_rec'];

    try {
        
        $query ="UPDATE recruteurs SET nom_rec=:nom_rec, prenom_rec=:prenom_rec, nom_entrep=:nom_entrep, adresse_entrep=:adresse_entrep, site_entrep=:site_entrep, ville_rec=:ville_rec, gmail_rec=:gmail_rec, mdps_rec=:mdps_rec WHERE id=:id LIMIT 1 ";
        $statement = $conn->prepare($query);

        $data = [
            ':nom_rec' => $nom_rec,
            ':prenom_rec' => $prenom_rec,
            ':nom_entrep' => $nom_entrep,
            ':adresse_entrep' => $adresse_entrep,
            ':site_entrep' => $site_entrep,
            ':ville_rec' => $ville_rec,
            ':gmail_rec' => $gmail_rec,
            ':mdps_rec' => $mdps_rec,
            ':id' => $id,
        ];

        $query_execute = $statement->execute($data);

        if($query_execute){
            $_SESSION['message'] = "UPDATED successfully";
            header('Location: dashboard.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Not UPDATED";
            header('Location: dashboard.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e-> getMessage();
    }
}

if(isset($_POST['btn-ajt-rec-admin'])){
    $nom_rec=$_POST['nom_rec'];
    $prenom_rec=$_POST['prenom_rec'];
    $nom_entrep=$_POST['nom_entrep'];
    $adresse_entrep=$_POST['adresse_entrep'];
    $site_entrep=$_POST['site_entrep'];
    $ville_rec=$_POST['ville_rec'];
    $gmail_rec=$_POST['gmail_rec'];
    $mdps_rec=$_POST['mdps_rec'];

 
    $query ="INSERT INTO recruteurs (nom_rec, prenom_rec, nom_entrep, adresse_entrep, site_entrep, ville_rec, gmail_rec, mdps_rec) VALUES(:nom_rec, :prenom_rec, :nom_entrep, :adresse_entrep, :site_entrep, :ville_rec, :gmail_rec, :mdps_rec)";
    $query_run = $conn->prepare($query);

    $data = [
        ':nom_rec' => $nom_rec,
        ':prenom_rec' => $prenom_rec,
        ':nom_entrep' => $nom_entrep,
        ':adresse_entrep' => $adresse_entrep,
        ':site_entrep' => $site_entrep,
        ':ville_rec' => $ville_rec,
        ':gmail_rec' => $gmail_rec,
        ':mdps_rec' => $mdps_rec,

    ];
    
    $query_execute = $query_run->execute($data);

    if($query_execute){
        $_SESSION['message'] = "inserted successfully";
        header('Location: dashboard.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = "Not inserted";
        header('Location: dashboard.php');
        exit(0);
    }
}


if(isset($_POST['btn-ajt-rec'])){
    $nom_rec=$_POST['nom_rec'];
    $prenom_rec=$_POST['prenom_rec'];
    $nom_entrep=$_POST['nom_entrep'];
    $adresse_entrep=$_POST['adresse_entrep'];
    $site_entrep=$_POST['site_entrep'];
    $ville_rec=$_POST['ville_rec'];
    $gmail_rec=$_POST['gmail_rec'];
    $mdps_rec=$_POST['mdps_rec'];

 
    $query ="INSERT INTO recruteurs (nom_rec, prenom_rec, nom_entrep, adresse_entrep, site_entrep, ville_rec, gmail_rec, mdps_rec) VALUES(:nom_rec, :prenom_rec, :nom_entrep, :adresse_entrep, :site_entrep, :ville_rec, :gmail_rec, :mdps_rec)";
    $query_run = $conn->prepare($query);

    $data = [
        ':nom_rec' => $nom_rec,
        ':prenom_rec' => $prenom_rec,
        ':nom_entrep' => $nom_entrep,
        ':adresse_entrep' => $adresse_entrep,
        ':site_entrep' => $site_entrep,
        ':ville_rec' => $ville_rec,
        ':gmail_rec' => $gmail_rec,
        ':mdps_rec' => $mdps_rec,

    ];
    
    $query_execute = $query_run->execute($data);

    if($query_execute){
        $_SESSION['message'] = "inserted successfully";
        header('Location: login_recruteur.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = "Not inserted";
        header('Location: login_recruteur.php');
        exit(0);
    }
}

?>
