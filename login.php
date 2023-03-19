<?php
include "db_conn.php"; 

if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data= trim($data);
        $data=stripslashes(($data));
        $data =htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    session_start(); // démarrer la session
    $_SESSION['names']=$_POST['uname']; 

    if(empty($uname)){

        header("Location : login_recruteur.php?error=User NAme is required");
        exit();
    }
    else if(empty($pass)){
        header("Location : login_recruteur.php?error=Password NAme is required");
        exit();
    }else{
        
        $contenuClient = $conn->prepare("SELECT * FROM recruteurs WHERE nom_rec='$uname' AND mdps_rec='$pass'");
		$contenuClient->execute();

       
        if($ligne = $contenuClient->fetch()){
            header("location: EspaceRec.php");
            }
      else{
        header("location: login_recruteur.php?error=Incorrect User name or password");
        exit();
        // echo 'les informations incorects';
      }
    }

}
else{

    header("Location : login_recruteur.php");
    exit();
}

?>