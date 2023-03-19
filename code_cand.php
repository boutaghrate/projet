<?php
session_start();
include('db_cand.php');

if(isset($_POST['delete_cand'])){

    $id = $_POST['delete_cand'];

    try {
        
        
        $query ="DELETE FROM candidats WHERE id=:id";
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

if(isset($_POST['btn-update-cand'])){
    
    $id = $_POST['id'];
    $nom_cand=$_POST['nom_cand'];
    $prenom_cand=$_POST['prenom_cand'];
    $cne_cand=$_POST['cne_cand'];
    $gmail_cand=$_POST['gmail_cand'];
    $adresse_cand=$_POST['adresse_cand'];
    $code_postale=$_POST['code_postale'];
    $date_naiss=$_POST['date_naiss'];
    $mdps_cand=$_POST['mdps_cand'];
    $ville_cand=$_POST['ville_cand'];
    $sexe_cand=$_POST['sexe_cand'];
    $niveau_etude=$_POST['niveau_etude'];
    $profil=$_POST['profil'];

    $experience=$_POST['experience'];

    try {
        
        $query ="UPDATE candidats SET 	nom_cand=:nom_cand,	prenom_cand=:prenom_cand,	cne_cand=:cne_cand,	gmail_cand=:gmail_cand,	adresse_cand=:adresse_cand,	code_postale=:code_postale, profil=:profil,	date_naiss=:date_naiss,	mdps_cand=:mdps_cand,	ville_cand=:ville_cand,	sexe_cand=:sexe_cand, niveau_etude=:niveau_etude, experience=:experience WHERE id=:id LIMIT 1 ";
        $statement = $conn->prepare($query);

        $data = [
            ':nom_cand' => $nom_cand,
            ':prenom_cand' => $prenom_cand,
            ':cne_cand' => $cne_cand,
            ':gmail_cand' => $gmail_cand,
            ':adresse_cand' => $adresse_cand,
            ':code_postale' => $code_postale,
            ':date_naiss' => $date_naiss,
            ':mdps_cand' => $mdps_cand,
            ':ville_cand' => $ville_cand,
            ':sexe_cand' => $sexe_cand,
            ':niveau_etude' => $niveau_etude,
            ':experience' => $experience,
            ':profil' => $profil,
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

if(isset($_POST['btn-ajt-cand']) ){

    $nom_cand=$_POST['nom_cand'];
    $prenom_cand=$_POST['prenom_cand'];
    $cne_cand=$_POST['cne_cand'];
    $gmail_cand=$_POST['gmail_cand'];
    $adresse_cand=$_POST['adresse_cand'];
    $code_postale=$_POST['code_postale'];
    $date_naiss=$_POST['date_naiss'];
    $mdps_cand=$_POST['mdps_cand'];
    $ville_cand=$_POST['ville_cand'];
    $sexe_cand=$_POST['sexe_cand'];
    $niveau_etude=$_POST['niveau_etude'];
    $domaine=$_POST['domaine'];
    $experience=$_POST['experience'];
    
    
    $query ="INSERT INTO candidats ( nom_cand,prenom_cand,cne_cand,gmail_cand,adresse_cand,code_postale,date_naiss,mdps_cand,ville_cand,sexe_cand,niveau_etude,domaine,experience) VALUES(:nom_cand,:prenom_cand,:cne_cand,:gmail_cand,:adresse_cand,:code_postale,:date_naiss,:mdps_cand,:ville_cand,:sexe_cand, :niveau_etude, :domaine, :experience)";
    $query_run = $conn->prepare($query);

    $data = [
        ':nom_cand' => $nom_cand,
        ':prenom_cand' => $prenom_cand,
        ':cne_cand' => $cne_cand,
        ':gmail_cand' => $gmail_cand,
        ':adresse_cand' => $adresse_cand,
        ':code_postale' => $code_postale,
        ':niveau_etude' => $niveau_etude,
        ':domaine' => $domaine,
        ':experience' => $experience, 
        ':date_naiss' => $date_naiss,
        ':mdps_cand' => $mdps_cand,
        ':ville_cand' => $ville_cand,
        ':sexe_cand' => $sexe_cand,
        ':niveau_etude' => $niveau_etude,
        ':domaine' => $domaine,
        ':experience' => $experience,
    ];
    
    $query_execute = $query_run->execute($data);

    if($query_execute){

        $_SESSION['message'] = "inserted successfully";
        header('Location: login_candidat.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = "Not inserted";
        header('Location: login_candidat.php');
        exit(0);
    }
}

if(isset($_POST['btn-ajt-cand2']) ){

    $nom_cand=$_POST['nom_cand'];
    $prenom_cand=$_POST['prenom_cand'];
    $cne_cand=$_POST['cne_cand'];
    $gmail_cand=$_POST['gmail_cand'];
    $adresse_cand=$_POST['adresse_cand'];
    $code_postale=$_POST['code_postale'];
    $date_naiss=$_POST['date_naiss'];
    $mdps_cand=$_POST['mdps_cand'];
    $ville_cand=$_POST['ville_cand'];
    $sexe_cand=$_POST['sexe_cand'];
    $niveau_etude=$_POST['niveau_etude'];
    $domaine=$_POST['domaine'];
    $experience=$_POST['experience'];
    $languages=$_POST['languages'];

    
 
    $query ="INSERT INTO candidats ( nom_cand,prenom_cand,cne_cand,gmail_cand,adresse_cand,code_postale,date_naiss,mdps_cand,ville_cand,sexe_cand,niveau_etude,domaine,experience) VALUES(:nom_cand,:prenom_cand,:cne_cand,:gmail_cand,:adresse_cand,:code_postale,:date_naiss,:mdps_cand,:ville_cand,:sexe_cand, :niveau_etude, :domaine, :experience)";
    $query_run = $conn->prepare($query);

    $data = [
        ':nom_cand' => $nom_cand,
        ':prenom_cand' => $prenom_cand,
        ':cne_cand' => $cne_cand,
        ':gmail_cand' => $gmail_cand,
        ':adresse_cand' => $adresse_cand,
        ':code_postale' => $code_postale,
         ':date_naiss' => $date_naiss,
        ':mdps_cand' => $mdps_cand,
        ':ville_cand' => $ville_cand,
        ':sexe_cand' => $sexe_cand,
        ':niveau_etude' => $niveau_etude,
        ':domaine' => $domaine,
        ':experience' => $experience,
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

?>

