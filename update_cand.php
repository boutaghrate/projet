<?php
 
 include('db_cand.php');
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
    <svg style="position:fixed; " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" id="waves"><path fill="#376f9e" fill-opacity="1" d="M0,64L60,96C120,128,240,192,360,186.7C480,181,600,107,720,112C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
 
    
  <div class="container">
    <div style="margin-top:500px" class="login-box">
      <h2 style="text-align: center;">Espace candidat Update !!</h2>
      </br>
      <?php
     if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query ="SELECT * FROM candidats where id=:id LIMIT 1";
        $statement = $conn->prepare($query);
        $data = [
            ':id' => $id,
        ];
        $statement-> execute($data);
       $result = $statement-> fetch(PDO::FETCH_OBJ);

     }
?>
      <form action="code_cand.php" method="POST" class="login">

               <input type="hidden" name="id" value="<?= $result-> id ;?>">
               
          <div  class="form-group">
              <input type="text" placeholder="Nom" name="nom_cand" value="<?=$result-> nom_cand;  ?>" id="nom" class="form-control">
          </div>

          <div class="form-group">
             <input type="text" placeholder="Prenom" name="prenom_cand" value="<?=$result-> prenom_cand;  ?>" id="prenom" class="form-control">
          </div>

          <div class="form-group">
             <input type="text" placeholder="CNE" name="cne_cand" id="CNE" value="<?=$result-> cne_cand;  ?>" class="form-control">
          </div>

          <div class="form-group">
             <input type="email" placeholder="Gmail" name="gmail_cand" id="mail" value="<?=$result-> gmail_cand;  ?>" class="form-control">
          </div>

          <div class="form-group">
             <input type="text" placeholder="adresse" name="adresse_cand" id="adresse" value="<?=$result-> adresse_cand;  ?>" class="form-control">
          </div>

          <div  class="form-group">
              <input type="text" placeholder="Code Postal" name="code_postale" id="code" value="<?=$result-> code_postale;  ?>" class="form-control">
          </div>
       
           <div class="form-group">
             <input type="date" id="date_naiss" name="date_naiss" value="<?=$result-> date_naiss;  ?>">
          </div>
          <div class="form-group">
              <input type="password" placeholder="MotDePasse" value="<?=$result-> mdps_cand;  ?>" name="mdps_cand" id="mdps" class="form-control">
          </div>
          <div class="form-group">
              <input type="password" placeholder="Confirmation-MDP" value="<?=$result-> mdps_cand;  ?>" name="mdps_cand" id="cmdps" class="form-control">
          </div>
          <div class="form-group">
              <input type="text" placeholder="Ville" id="ville" value="<?=$result-> ville_cand;  ?>" name="ville_cand" class="form-control">
          </div> 

          <div>
             <select id="sexe" name="sexe_cand" value="<?=$result-> sexe_cand;  ?>" required >
                <option value="choix">veuillez entre votre sexe </option> 
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
             </select>
          </div>
          <br><br>
  <div  class="form-group">
            <select id="niveau" name="niveau_etude" required>
                <option value="non-definie">Choisir Niveau d'études...</option>
                <option value="BAC">BAC</option>
                <option value="BAC+2">BAC+2</option>
                <option value="BAC+3">BAC+3</option>
                <option value="BAC+5">BAC+5</option>
                <option value="BAC+7">BAC+7</option>
            </select>
        </div>
        
        <div  class="form-group">
            <select id="profil" name="profil" required>
              <option value="Non-definie">Choisir profil...</option>
              <option value="etudiant">étudiant</option>
              <option value="technicien">technicien</option>
              <option value="technicien-specialise">Technicien specialisé</option>
              <option value="licensie">licensié</option>
              <option value="master">master</option>
              <option value="ingenieur">ingenieur</option>
              <option value="doctorant">doctorant</option>
               </select>
          </div>

          <div  class="form-group">
                <select name="experience" id="" required>
                <option value="non">Choisir Experience...</option>
                <option value="Non-demande">Non</option>
                <option value="Debutant">Débutant</option>
                <option value="Junior">Junior</option>
                <option value="Senior">Senior</option>
                </select>
        </div>

          </br></br>
       
          <div class="form-group">
                <button type="submit" onclick="verifier()" id="valider" name="btn-update-cand" class="full-btn">Sign up</button>
          </div>

      </form>



 </div> </br></br>
 </div>
 <script>
    const btn = document.getElementById('valider');
const password = document.getElementById('mdps');
const confirmPassword = document.getElementById('cmdps');

btn.addEventListener('click', function (e) {
  if (password.value !== confirmPassword.value) {
    password.style.borderColor = "red";
    confirmPassword.style.borderColor = "red";
    e.preventDefault();
  } 
});

   </script>
 <script src="erreur.js"></script>

</body>
</html>
