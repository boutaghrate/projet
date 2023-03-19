<?php
session_start();
include('db_cand.php');

if(isset($_POST['delete_offre'])){

    $id = $_POST['delete_offre'];

    try {
        
        $query ="DELETE FROM offres WHERE id=:id";
        $statement = $conn->prepare($query);
        $data = [':id'=> $id ];

        $query_execute=$statement->execute($data);

        if($query_execute){
            $_SESSION['message'] = "Deleted successfully";
            header('Location: EspaceRec.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Not Deleted";
            header('Location: EspaceRec.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

if(isset($_POST['btn-update-offre'])){

    
    $id = $_POST['id'];
    $poste=$_POST['poste'];
    $mission=$_POST['mission'];
    $niveau_etude=$_POST['niveau_etude'];
    $experience=$_POST['experience'];
    $domaine=$_POST['domaine'];
    $contrat=$_POST['contrat'];
    $ville=$_POST['ville'];
    $salaire=$_POST['salaire'];
    $languages=$_POST['languages'];
    $frameworks=$_POST['frameworks'];
    $D_expiration=$_POST['D_expiration'];
    $D_orale=$_POST['D_orale'];
    $D_concours=$_POST['D_concours'];


    try {
        
        $query ="UPDATE offres SET 		poste=:poste,	mission=:mission,	niveau_etude=:niveau_etude,	experience=:experience,	domaine=:domaine,	contrat=:contrat,	ville=:ville,	salaire=:salaire, languages=:languages, frameworks=:frameworks,	D_expiration=:D_expiration,	D_orale=:D_orale,	D_concours=:D_concours  WHERE id=:id LIMIT 1 ";
        $statement = $conn->prepare($query);

        $data = [

           
            ':id' => $id,
            ':poste' => $poste,
            ':mission' => $mission,
            ':niveau_etude' => $niveau_etude,
            ':experience' => $experience,
            ':domaine' => $domaine,
            ':contrat' => $contrat,
            ':ville' => $ville,
            ':salaire' => $salaire,
            ':languages' => $languages,
            ':frameworks' => $frameworks,
            ':D_expiration' => $D_expiration,
            ':D_orale' => $D_orale,
            ':D_concours' => $D_concours,

        ];

        $query_execute = $statement->execute($data);

        if($query_execute){
            $_SESSION['message'] = "UPDATED successfully";
            header('Location: EspaceRec.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Not UPDATED";
            header('Location: EspaceRec.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e-> getMessage();
    }
}

if(isset($_POST['btn-ajt-offre']) ){
    
    $poste = $_POST['poste'];
    $mission = $_POST['mission'];
    $niveau_etude = $_POST['niveau_etude'];
    $experience = $_POST['experience'];
    $domaine = $_POST['domaine'];
    $contrat = $_POST['contrat'];
    $ville = $_POST['ville'];
    $salaire = $_POST['salaire'];
    $languages=$_POST['languages'];
    $frameworks=$_POST['frameworks'];
    $D_expiration = $_POST['D_expiration'];
    $D_orale = $_POST['D_orale'];
    $D_concours = $_POST['D_concours'];

    $names = $_SESSION['names'];
    $requete = "SELECT id FROM recruteurs WHERE nom_rec=:names";
    $id_rec_prepare = $conn->prepare($requete);

    $id_rec_prepare->bindParam(":names", $names);
    $id_rec_prepare->execute();

    $id_rec = $id_rec_prepare->fetchcolumn();


    $query = "INSERT INTO offres (poste, mission, niveau_etude, experience, domaine, contrat, ville, salaire, languages, frameworks, D_expiration, D_orale, D_concours, id_rec) VALUES (:poste, :mission, :niveau_etude, :experience, :domaine, :contrat, :ville, :salaire, :languages, :frameworks, :D_expiration, :D_orale, :D_concours, :id_rec)";
    $query_run = $conn->prepare($query);

    $data = [

        ':poste' => $poste,
        ':mission' => $mission,
        ':niveau_etude' => $niveau_etude,
        ':experience' => $experience,
        ':domaine' => $domaine,
        ':contrat' => $contrat,
        ':ville' => $ville,
        ':salaire' => $salaire,
        ':languages' => $languages,
        ':frameworks' => $frameworks,
        ':D_expiration' => $D_expiration,
        ':D_orale' => $D_orale,
        ':D_concours' => $D_concours,
        ':id_rec' => $id_rec,
    ];

    $query_execute = $query_run->execute($data);

    if($query_execute){
        $_SESSION['message'] = "inserted successfully";
        header('Location: EspaceRec.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = "Not inserted";
        header('Location: EspaceRec.php');
        exit(0);
    }


}


?>

