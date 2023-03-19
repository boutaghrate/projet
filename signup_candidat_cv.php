<?php

session_start();
include('db_cand.php');

	if(isset($_POST['submit'])){

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

    $_SESSION['nom_cand']=$nom_cand;
    $_SESSION['cne_cand']=$cne_cand;
    
    
    $query ="INSERT INTO candidats ( nom_cand,prenom_cand,cne_cand,gmail_cand,adresse_cand,code_postale,date_naiss,mdps_cand,ville_cand,sexe_cand,niveau_etude,profil,experience) VALUES(:nom_cand,:prenom_cand,:cne_cand,:gmail_cand,:adresse_cand,:code_postale,:date_naiss,:mdps_cand,:ville_cand,:sexe_cand, :niveau_etude, :profil, :experience)";
    $query_run = $conn->prepare($query);

    $data = [
        ':nom_cand' => $nom_cand,
        ':prenom_cand' => $prenom_cand,
        ':cne_cand' => $cne_cand,
        ':gmail_cand' => $gmail_cand,
        ':adresse_cand' => $adresse_cand,
        ':code_postale' => $code_postale,
        ':niveau_etude' => $niveau_etude,
        ':profil' => $profil,
        ':experience' => $experience, 
        ':date_naiss' => $date_naiss,
        ':mdps_cand' => $mdps_cand,
        ':ville_cand' => $ville_cand,
        ':sexe_cand' => $sexe_cand,
        ':niveau_etude' => $niveau_etude,
        ':profil' => $profil,
        ':experience' => $experience,
    ];
    
    $query_execute = $query_run->execute($data);
    
        if($query_execute){
    
            $_SESSION['message'] = "inserted successfully";
            header('Location: signup_candidat_cv.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Not inserted";
            header('Location: signup_candidat.php');
            exit(0);
        }

      

    }

	?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Login</title>
 <link rel="stylesheet" href="signup_candidat.css">
 
</head>
<body>
    <svg style=" padding-top: 0; " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" id="waves"><path fill="#376f9e" fill-opacity="1" d="M0,64L60,96C120,128,240,192,360,186.7C480,181,600,107,720,112C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
 
    
  <div class="container">
     <div class="login-box">
      <h2 style="text-align: center;">Espace candidat</h2>
      </br>
      <form  action="signup_candidat_lang.php" method="POST"  class="login" enctype="multipart/form-data">       

          <div  class="form-group">
            <label for="cv">Joindre votre CV :</label>

            <input type="hidden" name="nom_cand" value="<?php echo $_SESSION['nom_cand'];?>">
            <input type="hidden" name="cne_cand" value="<?php echo $_SESSION['cne_cand'];?>">

            <input type="file" id="cv" name="file"  accept="application/pdf" class="form-control" required>
          </div>
         
            <button type="submit" onclick="verifier()" name="submit" class="full-btn">Sign up</button>

      </form>

     </div>

   </div> 
 

 <script src="erreur.js"></script>

</body>
</html>
