<?php 
session_start(); 
include('db_rec.php');

$bdd = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

$name = $_SESSION['names'];

$query = "SELECT id FROM recruteurs WHERE nom_rec='$name' LIMIT 1";
$statement = $bdd->prepare($query);
$statement->execute();
$id_rec = $statement->fetchColumn();

if(isset($_POST['envoi_message'])){
    if(isset($_POST['destinataire'],$_POST['message']) && !empty($_POST['destinataire']) && !empty($_POST['message'])) {
         $destinataire = htmlspecialchars($_POST['destinataire']);
         $message = htmlspecialchars($_POST['message']);

         $id_cand = $bdd->prepare('SELECT id FROM candidats WHERE nom_cand=?');
         $id_cand->execute(array($destinataire));

         $cand_exist = $id_cand->rowCount();
         if($cand_exist!=0){
            $id_cand = $id_cand->fetch();
            $id_cand = $id_cand['id'];
            $date = date('Y-m-d ');
            $ins = $bdd->prepare('INSERT INTO messagerie(message,id_rec,id_cand) VALUES (?,?,?)');
            $ins->execute(array($message,$id_rec,$id_cand));
            // Store the date in a session variable
          $_SESSION['date_envoi'] = $date;
            $error = "Votre message a bien été envoyé !";
         }
         else{
            $error = "Cet utilisateur n'existe pas...";
         }
    }
    else {
            $error = "Veuillez compléter tous les champs";
         }
}

$nom_cand = $bdd->query('SELECT nom_cand FROM candidats ORDER BY nom_cand');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="EspaceRec.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        .card {

            margin-top: 40px;
  width: 100%;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  -webkit-box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
          box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
}

.chat-header {
  background-color: steelblue;
  color: black;
  padding: 10px;
  font-size: 18px;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  font-weight : bold;

}

.chat-window {
  height: 220px;
  overflow-y: scroll;
}

.message-list {
    height:auto;

  list-style: none;
  margin: 0;
  padding: 20px ;
}

.chat-input {
  display: -webkit-box;
  display: -ms-flexbox;
  display: block;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 30px;
  border-top: 1px solid #ccc;
}

.message-input {
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  /* border: none;
  outline: none; */
  padding: 5px;
  font-size: 14px;
  width : 100%;
  height : 100px;
}

.send-button {
  border: none;
  outline: none;
  background-color: #333;
  color: #fff;
  font-size: 14px;
  padding: 5px 10px;
  cursor: pointer;
}

.send-button:hover {
  background-color: rgb(255, 255, 255);
  color: rgb(0, 0, 0);
  -webkit-box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
          box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
}
    </style>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image" style="background-color: steelblue;">
                <img src="logo_vert-removebg-preview.png" alt="">
            </div>

            <span class="logo_name">Lantana</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Content</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Like</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Comment</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="logout2.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <?php
                     
                     $name = $_SESSION['names'];

                     $query ="SELECT  * FROM recruteurs where nom_rec='$name' LIMIT 1" ;
                     $statement = $conn->prepare($query);
                     $statement->execute();

                     $result = $statement->fetchAll();
                     if($result)
                     {
                         
                         foreach($result as $row){
                             ?>
         <span><b> <?php echo $row['nom_rec'].' '.$row['prenom_rec'];} }?></b></span>
            <img style="background-color: steelblue;" src="user.png" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Procedure :</span>
                </div>

                <div class="boxes">
                   
                    <!-- <div class="box box2">
                        <img src="offre.png" alt="" class="img-dash">
                        <span class="text">Total offres</span>
                        <span class="number">20,120</span>
                    </div> -->
                    <div class="rubrique">
                      
                        <h1>1 :  <br>Trier</h1>
                      
                      </div>
                      
                      <div class="rubrique">
                        <h1>2 : <br>Contactez</h1>
                        
                      </div>
                      
                      <div class="rubrique">
                        <h1>3 :  <br>Recruter</h1>
                      
                      </div>
                      
                    <!-- <div class="box box2">
                        <img src="candidat.png" alt="" class="img-dash">
                        <span class="text">Total candidats</span>
                        <span class="number">20,120</span>
                    </div> -->
                </div>
            </div>

            <br> <br>
<hr>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">List des offres publiées </span>
                    <button><a href="creation_offre.php">+ajouter offre</a> </button>
                </div>

                <div class="activity-data">
                    <table>
                        <tr>
                            <td>IdOffre</td>
                            <td>Poste</td>
                            <td>Domaine</td>
                            <td>Experience</td>
                            <td>Salaire</td>
                            <td>Ville</td>
                            <td>Date expiration</td>
                            <td>Update</td>
                            <td>delete</td>
                        </tr>
                        <?php
                        
                         $names = $_SESSION['names'];
                         $requete = "SELECT id FROM recruteurs WHERE nom_rec=:names";
                         $id_rec_prepare = $conn->prepare($requete);
                     
                         $id_rec_prepare->bindParam(":names", $names);
                         $id_rec_prepare->execute();
                     
                         $id_rec = $id_rec_prepare->fetchcolumn();
                         
                         $_SESSION['idrec']=$id_rec;

                        $query ="SELECT  * FROM offres where id_rec=:id_rec";
                        $statement = $conn->prepare($query);
                        $statement->bindParam(":id_rec", $id_rec);

                        $statement->execute();

                        $result = $statement->fetchAll();
                        if($result)
                        {
                            foreach($result as $row){
                                ?>
                                <tr>
                                   <td><?= $row['id']; ?></td>
                                   <td><?= $row['poste']; ?></td>
                                   <td><?= $row['domaine']; ?></td>
                                   <td><?= $row['experience']; ?></td>
                                   <td><?= $row['salaire']; ?></td>
                                   <td><?= $row['ville']; ?></td>
                                   <td><?= $row['D_expiration']; ?></td>
                        

                                   <td><button style="background: orange;"><a href="update_offre.php?id=<?= $row['id']; ?>">update</a> </button></td>
                                   <td> 
                                    <form action="code_offre.php" method="post">
                                        <button type="submit" name="delete_offre" value="<?=$row['id']; ?>">Delete</button>
                                    </form>
                                   </td>
                                </tr>
                                <?php

                            }
                       
                        }
                        else
                        {

                        ?>
                        <tr>
                            <td colspan="10">No Record found</td>
                        </tr>
                        <?php
                        }
                        ?>
                              
               
       
                    </table>
                </div>
            </div>
            <br>
            <br>
<hr>
 
            <div class="activity">
                <div class="title">

                    <i class="uil uil-clock-three"></i>
                    <span class="text">List Candidatures </span>
                    <!-- <button class="ab">trier par offre :  </button>
                    <input type="number" id="trie" min="0">
                    <button class="ab">trier par Score :  </button>
                    <input   type="number" id="trie" min="0"> -->
                   
                </div>

                <div class="activity-data">
                    <table>
                        <tr>
                            <td>IdOffre</td>
                            <td>Nom complet</td>
                            <td>Score</td>
                            <td>E-mail</td> 
                            <td>Poste d'offre</td>
                            <td>adresse</td>
                            <td>Profile</td>
                            <td>Contrat</td>
                            <td>Niveau d'etude</td>
                            <td>CV (pdf)</td>
                            <td>delete</td>
                        </tr>
                        <?php
                        
                        $id_rec = $_SESSION['idrec']; // récupère l'ID du recruteur depuis la session

                        $requete = "SELECT * FROM candidatures 
                                    JOIN candidats ON candidats.id = candidatures.id_cand
                                    JOIN offres ON candidatures.id_offre = offres.id
                                    JOIN cv ON cv.id_cand = candidatures.id_cand
                                    WHERE offres.id_rec = :id_rec
                                    ORDER BY score "; // utilise le paramètre :id_rec au lieu de :names
                        
                        $statement = $conn->prepare($requete);
                        $statement->bindParam(":id_rec", $id_rec); // lie la variable $id_rec au paramètre :id_rec
                        $statement->execute();
                        $result = $statement->fetchAll();
                        
                       if($result)
                       {
                           foreach($result as $row){
                        
                               ?>
                               <tr>
                         
                                  <td><?= $row['id_offre']; ?></td>
                                  <td><?php echo $row['nom_cand'] ; echo " ".$row['prenom_cand'] ;  ?></td>
                                  <td><?= $row['score']; ?></td>
                                  <td><?= $row['gmail_cand']; ?></td>
                                  <td><?= $row['poste']; ?></td>
                                  <td><?= $row['adresse_cand']; ?></td>
                                  <td><?= $row['profil']; ?></td>
                                  <td><?= $row['contrat']; ?></td>
                                  <td><?= $row['niveau_etude']; ?></td>
                                  <td> <?php
                                  $idd = $row['id_cand'];
                                  $nm= $row['nom_cand'];
                                  $offre= $row['id_offre'];
                                  $query=$conn->query("select * from cv where id_cand='$idd' ");
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			
                <a href="download.php?filename=<?php echo $name;?>&f=<?php echo 
                    $row['fname'] ?>">
                    <!-- <i class="uil uil-files-landscapes"></i> -->
                    <span class="link-name">
			
					<?php echo $name ;?>
			<?php 
        }
        ?>
        </td>
             <td><button name="off" style="background: orange;"><a href="EspaceRec.php?nom=<?php echo $nm;?>&offre=<?php echo $offre;?> ">Recruter</a> </button></td>
                               </tr>
                               <?php
                           }
                      
                       }
                       else
                       {

                       ?>
                       <tr>

                           <td colspan="10">No Record found</td>
                       </tr>
                       <?php
                       }
                       ?>
                             
                     
                    </table>
                </div>
            </div>

            
        </div>
        
        <div class="card" >
        <div class="chat-header"> <img style="width: 30px; margin: 0 10px 0 10px ;" src="messager.png" alt="">Boite Messagerie      <?php if(isset($error)) { echo '     <span style="color:red">'.$error.'</span>'; } ?>
</div>

        <?php
    // Establish database connection
$dsn = 'mysql:host=localhost;dbname=projetweb';
$username = 'root';
$password = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$dbh = new PDO($dsn, $username, $password, $options);

// Get session variables
$id_candidat_postuler = $_SESSION['id_candidat_postuler'];
$name = $_SESSION['names'];

// Query database for messages
$query = "SELECT message FROM messagerie WHERE id_cand=:id_candidat_postuler AND id_rec=(SELECT id FROM recruteurs WHERE nom_rec=:name limit 1)";
$stmt = $dbh->prepare($query);
$stmt->bindParam(':id_candidat_postuler', $id_candidat_postuler);
$stmt->bindParam(':name', $name);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if $results is not empty
if (!empty($results)) {
    // Display messages

//la date du message
    // $date= $_SESSION['date_envoi'];

?>
<div class="chat-window" >
<ul class="message-list">
   <!-- <h1>Votre boite de message</h1> -->
   <?php

    foreach ($results as $result) {
        echo "<p> le message :{ " . $result['message'] ." }</p>";
    }
} else {

    echo "<p>No messages found.</p>";
}
?>
</ul>
</div>


<form method="POST" action="EspaceRec.php">
    <div class="chat-input">
    <label style:>candidat:</label>

    <?php while($d=$nom_cand->fetch()){?>
     <!-- <option><?= $d['nom_cand'] ?></option> -->
     <?php } ?> 
    <input type="text" value="<?php if(isset($_GET['nom'])) { echo $_GET['nom']; } ?>"  name="destinataire" />
    <br> <br>
    
    <textarea placeholder="Votre message" class="message-input" name="message">
        <?php 
        
        if(isset($_GET['offre'])){

            $of=$_GET['offre'];
            $requete="SELECT * from offres where id='$of' ";
            $prep=$bdd->prepare($requete);
            $prep->execute();
            $exec = $prep->fetchall();
            $name = $_SESSION['names'];
            foreach ($exec as $key ) {
            echo "Bonjour ". $_GET['nom'].",
             
            Je suis ravi de vous informer que vous avez été sélectionné pour participer au concours le ".$key['D_concours']. " pour le poste ".$key['poste'] . " que vous avez postulé. Après avoir examiné attentivement votre dossier, nous sommes convaincus que vous avez les compétences et l'expérience nécessaires pour ce poste.
                    
            Nous vous remercions encore pour votre intérêt pour notre entreprise  et nous sommes persuadés que vous avez toutes les qualités requises pour relever les défis que ce poste comporte.
            
            Cordialement,
              $name " ;

            }
        }
        ?>
    </textarea>
    <br /><br />
    <input type="submit" class="send-button" value="Envoyer" name="envoi_message" />
    </div>
    <br /><br />
</form>
</div >

</div>

    </section>

    <script src="dashboard.js"></script>
</body>
</html>

