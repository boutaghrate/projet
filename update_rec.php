<?php
 
 include('db_rec.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Login</title>
 <link rel="stylesheet" href="SignupRec.css">
 
</head>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" id="waves"><path fill="#376f9e" fill-opacity="1" d="M0,64L60,96C120,128,240,192,360,186.7C480,181,600,107,720,112C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
 
    
    <div class="container">
 <div class="login-box">
 <h2 style="text-align: center;">Espace Recruteur : (UPADTE !!)</h2>
</br>
<?php
     if(isset($_GET['id'])){
        $rec_id = $_GET['id'];

        $query ="SELECT * FROM recruteurs where id=:id LIMIT 1";
        $statement = $conn->prepare($query);
        $data = [
            ':id' => $rec_id,
        ];
        $statement-> execute($data);
       $result = $statement-> fetch(PDO::FETCH_OBJ);
     }
?>
 <form action="code_rec.php" method="POST" class="login">
    <input type="hidden" name="id" value="<?= $result-> id ?>">
  <div class="form-group">
    <input type="text" placeholder="Nom du Recruteur" name="nom_rec" value="<?=$result-> nom_rec;  ?>" id="nom" class="form-control" required>
    </div>
    <div class="form-group">
       <input type="text" placeholder="Prenom du Recruteur" name="prenom_rec" value="<?=$result-> prenom_rec;  ?>" id="prenom" class="form-control" required>
       </div> 
   <div class="form-group">
    <input type="text" placeholder="Nom de l'entreprise" name="nom_entrep" value="<?=$result-> nom_entrep;  ?>" id="company_name" class="form-control"name="company_name" required> 
  </div> 
    <div class="form-group">
      <input type="text" id="company_address" name="adresse_entrep" value="<?=$result-> adresse_entrep;  ?>" placeholder="Adresse de l'entreprise" class="form-control"name="company_address" required>
    </div>
 <div class="form-group">
  <input type="url" id="company_website" placeholder="Site web de l'entreprise" value="<?=$result-> site_entrep;  ?>" name="site_entrep" class="form-control" name="company_website" required>
    </div> 
    <div class="form-group"> 
      <input type="text" placeholder="Ville" id="ville" value="<?=$result-> ville_rec ;  ?>" name="ville_rec" class="form-control" required>
    </div>

    <div class="form-group">
        <input type="email" placeholder="Gmail" id="mail" value="<?=$result-> gmail_rec;  ?>" name="gmail_rec" class="form-control" required>
        </div>
 <div class="form-group">
 <input type="password" placeholder="MotDePasse" id="mdps" value="<?=$result-> mdps_rec;  ?>" name="mdps_rec" class="form-control" required>
 </div>
 <div class="form-group">
    <input type="password" placeholder="Confirmation-MDP" value="<?=$result-> mdps_rec;  ?>" id="cmdps" name="cmpds_rec" class="form-control" required>
    </div>
 
   
      </br></br>
       
 <div class="form-group"> 
     <button onclick="verifier()" name="btn-update-rec" type="submit" class="button2">Update</button>
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
