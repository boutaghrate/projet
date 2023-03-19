
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
      <form  action="signup_candidat_cv.php" method="POST"  class="login" >
          <div  class="form-group">
              <input type="text" placeholder="Nom" id="nom" name="nom_cand" class="form-control" required>
          </div>

          <div class="form-group">
             <input type="text" placeholder="Prenom" id="prenom" name="prenom_cand" class="form-control" required>
          </div>

          <div class="form-group">
             <input type="text" placeholder="CNE" id="CNE" name="cne_cand" class="form-control" required>
          </div>

          <div class="form-group">
             <input type="email" placeholder="Gmail" id="mail" name="gmail_cand" class="form-control" required>
          </div>

          <div class="form-group">
             <input type="text" placeholder="adrese" id="adresse" name="adresse_cand" class="form-control" required>
          </div>

          <div  class="form-group">
              <input type="text" placeholder="Code Postal" id="nom" name="code_postale" class="form-control" required>
          </div>
       
           <div class="form-group">
             <input type="date" name="date_naiss" required />
          </div>

          <div class="form-group">
              <input type="password" placeholder="MotDePasse" name="mdps_cand" id="mdps" class="form-control" required>
          </div>
          <div class="form-group">
              <input type="password" placeholder="Confirmation-MDP" name="mdps_cand" id="cmdps" class="form-control" required>
          </div>
          <div class="form-group">
              <input type="text" placeholder="Ville" id="ville" name="ville_cand" class="form-control" required>
          </div> 

          <div  class="form-group ">
             <select id="sexe" name="sexe_cand" required >
                <option value="choix">veuillez entre votre sexe </option> 
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
             </select>
          </div>

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

            <button type="submit" onclick="verifier()" name="submit" class="full-btn">Sign up</button>

      </form>

     </div>
   
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
