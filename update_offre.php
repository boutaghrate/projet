<?php 
session_start(); 
include('db_rec.php');
include('db_cand.php');
include('db_conn3.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="creation_offre.css">
 
</head>
<body>
    <svg style="position: fixed;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" id="waves"><path fill="#376f9e" fill-opacity="1" d="M0,64L60,96C120,128,240,192,360,186.7C480,181,600,107,720,112C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
    <div class="form-box">
        <h1 style="text-align: center;">Créer vorte offre :  </h1>
    </br>
    <?php
     if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query ="SELECT * FROM offres where id=:id LIMIT 1";
        $statement = $conn->prepare($query);
        $data = [
            ':id' => $id,
        ];
        $statement-> execute($data);
       $result = $statement-> fetch(PDO::FETCH_OBJ);
     }
?>
    <form action="code_offre.php" method="post" >
    <input type="hidden" name="id" value="<?= $result-> id ;?>">


        <div class="container-fluid">
               <div class="form-group">
                <label>Poste</label><br/> 
                  <input type="text" name="poste" value="<?= $result-> poste ;?>" class="form-control">
    </div> 
    <div class="form-group">
       <label>Mission</label><br/> 
       <input type="text " name="mission" value="<?= $result-> mission ;?>" class="form-control">
    </div> 
     
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Niveau d'étude</label><br/> 
        <select class="form-select" name="niveau_etude" value="<?= $result-> niveau_etude ;?>"  id="inputGroupSelect01">
        <option value="non-definie">Choisir...</option>
          <option value="BAC">BAC</option>
          <option value="BAC">BAC+2</option>
          <option value="BAC+3">BAC+3</option>
          <option value="BAC+5">BAC+5</option>
          <option value="BAC+5">BAC+7</option>
           </select>
     </div>
    
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Expérience</label><br/> 
        <select class="form-select" value="<?= $result-> experience ;?>" name="experience"  id="inputGroupSelect01">
        <option value="">Choisir...</option>
          <option value="Non-demandé">Non</option>
          <option value="Debutant">Débutant</option>
          <option value="Junior">Junior</option>
          <option value="Senior">Senior</option>
           </select>
        </div>
    <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Domaine</label><br/> 
            <select class="form-select" value="<?= $result-> domaine ;?>" name="domaine"  id="inputGroupSelect01">
            <option value="Non-definie">Choisir...</option>
              <option value="informatique">informatique</option>
              <option value="commerce">commerce</option>
              <option value="comptabilité">comptabilité</option>
               </select>
            </div> 
            <div> 
                <label>Langues</label><br/> 
                html <input type="checkbox" class="form-control">
                css<input type="checkbox" class="form-control">
                JavaScript<input type="checkbox" class="form-control">
                 <input type="checkbox" class="form-control">
                <input type="checkbox" class="form-control">
                <input type="checkbox" class="form-control">
                <input type="checkbox" class="form-control">
                <input type="checkbox" class="form-control">
                <input type="checkbox" class="form-control">

            </div> 

            <div> 
                <label>Langues</label><br/> 
                html <input type="checkbox" class="form-control">
                css<input type="checkbox" class="form-control">
                JavaScript<input type="checkbox" class="form-control">
                JavaScript <input type="checkbox" class="form-control">
                JavaScript <input type="checkbox" class="form-control">
                JavaScript<input type="checkbox" class="form-control">
                JavaScript<input type="checkbox" class="form-control">
                JavaScript<input type="checkbox" class="form-control">
                JavaScript<input type="checkbox" class="form-control">

            </div> 
        </div>
            
           
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Contrat</label><br/> 
                    <select class="form-select" name="contrat" <?= $result-> contrat ;?>  id="inputGroupSelect01">
                    <option value="Non-definie">Choisir...</option>
                      <option value="CDI">CDI</option>
                      <option value="CDD">CDD</option>
                      <option value="CTT">CTT</option>
                       </select>
                    </div> 
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Ville</label><br/> 
                    <input type="text" name="ville" value="<?= $result-> ville ;?>"  class="form-control">

                    </div> 
                <div class="form-group">
                    <label>Salaire</label><br/> 
                   <input type="number" name="salaire" value="<?= $result-> salaire ;?>"  class="form-control">
                </div> 
                <div class="form-group">
                    <label>Date d'expiration</label><br/> 
                   <input type="date" name="D_expiration" value="<?= $result-> D_expiration ;?>"  class="form-control">
                </div> 
                <div class="form-group">
                    <label>Date Orale</label><br/> 
                   <input type="date" name="D_orale" value="<?= $result-> D_orale ;?>"  class="form-control">
                </div> 
                <div class="form-group">
                    <label>Date Concours</label><br/> 
                   <input type="date" name="D_concours" value="<?= $result-> D_concours ;?>"  class="form-control">
                </div> 

                <!-- <input type="hidden" name="id"  class="form-control"> -->

                
                  </br> </br>
                <button type="submit"  onclick="verifier()" name="btn-update-offre" class="button2">
                UPDATE 
               </button>     
                </form>
    </div>
</div>
</div>
 
            </form></div>  
        
                    </br> </br> </br> </br>

                    <script src="erreur.js"></script>
</body>
</html>