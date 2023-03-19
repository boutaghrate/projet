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
    <form action="code_offre_admin.php" method="post" >
    <input type="hidden" name="id" value="<?= $result-> id ;?>">


        <div class="container-fluid">
               <div class="form-group">
                <label>Poste</label><br/> 
                  <input type="text" name="poste" value="<?= $result-> poste ;?>" class="form-control">
    </div> 
             <div> 
                <label>Mission</label><br/>
                <input type="text"  value="<?= $result-> mission ;?>" id="mission" name="mission" >    
            </div> 
     
    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Niveau d'étude</label><br/> 
<select class="form-select" name="niveau_etude" id="inputGroupSelect01">
    <option value="">Choisir...</option>
    <option value="BAC" <?= ($result->niveau_etude == 'BAC') ? 'selected' : ''; ?>>BAC</option>
    <option value="BAC+2" <?= ($result->niveau_etude == 'BAC+2') ? 'selected' : ''; ?>>BAC+2</option>
    <option value="BAC+3" <?= ($result->niveau_etude == 'BAC+3') ? 'selected' : ''; ?>>BAC+3</option>
    <option value="BAC+5" <?= ($result->niveau_etude == 'BAC+5') ? 'selected' : ''; ?>>BAC+5</option>
    <option value="BAC+7" <?= ($result->niveau_etude == 'BAC+7') ? 'selected' : ''; ?>>BAC+7</option>
</select>

     </div>
    
    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Expérience</label><br/> 
<select class="form-select" name="experience" id="inputGroupSelect01">
    <option value="">Choisir...</option>
    <option value="Non-definie" <?= ($result->experience == 'Non-definie') ? 'selected' : ''; ?>>Non</option>
    <option value="Débutant" <?= ($result->experience == 'Débutant') ? 'selected' : ''; ?>>Débutant</option>
    <option value="Junior" <?= ($result->experience == 'Junior') ? 'selected' : ''; ?>>Junior</option>
    <option value="Senior" <?= ($result->experience == 'Senior') ? 'selected' : ''; ?>>Senior</option>
</select>

        </div>
    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Domaine</label><br/> 
<select class="form-select" name="domaine" id="inputGroupSelect01">
    <option value="">Choisir...</option>
    <option value="informatique" <?= ($result->domaine == 'informatique') ? 'selected' : ''; ?>>informatique</option>
    <option value="commerce" <?= ($result->domaine == 'commerce') ? 'selected' : ''; ?>>commerce</option>
    <option value="comptabilité" <?= ($result->domaine == 'comptabilité') ? 'selected' : ''; ?>>comptabilité</option>
</select>

            </div> 
        </div>
            
           
                <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Contrat</label><br/>
<select class="form-select" name="contrat" id="inputGroupSelect01">

  <option value="non-defini">Choisir...</option>
  <option value="CDI" <?= ($result->contrat == 'CDI') ? 'selected' : '' ?>>CDI</option>
  <option value="CDD" <?= ($result->contrat == 'CDD') ? 'selected' : '' ?>>CDD</option>
  <option value="CTT" <?= ($result->contrat == 'CTT') ? 'selected' : '' ?>>CTT</option>
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
                <div> 
                <label>Languages</label><br/>
                <input type="text" placeholder="Languages Demandées" value="<?= $result-> languages ;?>"  id="languages" name="languages" >    
            </div> 
            <label>Frameworks</label><br/>
            <input type="text" placeholder="Frameworks Demandées" value="<?= $result-> frameworks ;?>"   id="frameworks" name="frameworks">    
            <div> 
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