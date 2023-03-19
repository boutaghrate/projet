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
    
    <form action="code_offre.php" method="post" >

        <div class="container-fluid">
               <div class="form-group">
                <label>Poste</label><br/> 
                  <input type="text" name="poste" class="form-control">
    </div> 
            <div> 
                <label>Mission</label><br/>
                <input type="text" id="mission" name="mission" >    
            </div> 
     
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Niveau d'étude</label><br/> 
        <select class="form-select" name="niveau_etude"  id="inputGroupSelect01">
          <option value="non-definie">Choisir...</option>
          <option value="BAC">BAC</option>
          <option value="BAC+2">BAC+2</option>
          <option value="BAC+3">BAC+3</option>
          <option value="BAC+5">BAC+5</option>
          <option value="BAC+7">BAC+7</option>
           </select>
     </div>
    
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Expérience</label><br/> 
        <select class="form-select" name="experience"  id="inputGroupSelect01">
          <option value="">Choisir...</option>
          <option value="Non-definie">Non</option>
          <option value="Debutant">Débutant</option>
          <option value="Junior">Junior</option>
          <option value="Senior">Senior</option>
           </select>
        </div>

    <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Domaine</label><br/> 
            <select class="form-select" name="domaine"  id="inputGroupSelect01">
              <option value="Non-definie">Choisir...</option>
              <option value="informatique">informatique</option>
              <option value="commerce">commerce</option>
              <option value="comptabilité">comptabilité</option>
               </select>
            </div> 

            <div> 
            <label>Languages</label><br/> 
                <input type="text"  id="languages" name="languages" >    
            </div> 
            <div>   
            <label>Frameworks</label><br/> 
              <input type="text"  id="frameworks" name="frameworks">    

            </div> 
        </div>
            
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Contrat</label><br/> 
                    <select class="form-select" name="contrat"  id="inputGroupSelect01">
                      <option value="Non-definie">Choisir...</option>
                      <option value="CDI">CDI</option>
                      <option value="CDD">CDD</option>
                      <option value="CTT">CTT</option>
                       </select>
                    </div> 
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Ville</label><br/> 
                    <input type="text" name="ville"  class="form-control">

                    </div> 
                <div class="form-group">
                    <label>Salaire</label><br/> 
                   <input type="number" name="salaire"  class="form-control">
                </div> 
                <div class="form-group">
                    <label>Date d'expiration</label><br/> 
                   <input type="date" name="D_expiration"  class="form-control">
                </div> 
                <div class="form-group">
                    <label>Date Orale</label><br/> 
                   <input type="date" name="D_orale"  class="form-control">
                </div> 
                <div class="form-group">
                    <label>Date Concours</label><br/> 
                   <input type="date" name="D_concours"  class="form-control">
                </div> 


                
                  </br> </br>
                <button type="submit"  onclick="verifier()" name="btn-ajt-offre" class="button2">
                Créer
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