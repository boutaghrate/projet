<?php
include "db_conn3.php"; 



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
    $_SESSION['name']=$_POST['uname']; 

    if(empty($uname)){

        header("Location : login_admin.php?error=User NAme is required");
        exit();
    }
    else if(empty($pass)){
        header("Location : login_admin.php?error=Password NAme is required");
        exit();
    }else{
        
        $contenuClient = $conn->prepare("SELECT * FROM admin WHERE name_admin='$uname' AND password='$pass'");
		$contenuClient->execute();

       
        if($ligne = $contenuClient->fetch()){
                 header("Location: dashboard.php");
                 exit;
                
            }
      else{
        header("location: login_admin.php?error=Incorrect User name or password");
        exit();
        // echo 'les informations incorects';
      }
    }

}
else{

    header("Location :login_admin.php");
    exit();
}

?>




