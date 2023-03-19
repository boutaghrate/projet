<?php 
session_start(); 
include('db_rec.php');

$bdd = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');

$id_candidat_postuler = $_SESSION['id_candidat_postuler'];


if(isset($_POST['envoi_message'])){
    if(isset($_POST['destinataire'],$_POST['message']) && !empty($_POST['destinataire']) && !empty($_POST['message'])) {
         $destinataire = htmlspecialchars($_POST['destinataire']);
         $message = htmlspecialchars($_POST['message']);

         $id_rec = $bdd->prepare('SELECT id FROM recruteurs WHERE nom_rec=?');
         $id_rec->execute(array($destinataire));

         $cand_exist = $id_rec->rowCount();
         if($cand_exist!=0){
            $id_rec = $id_rec->fetch();
            $id_rec = $id_rec['id'];
            $date = date('Y-m-d ');
            $ins = $bdd->prepare('INSERT INTO messagerie(message,id_rec,id_cand) VALUES (?,?,?)');
            $ins->execute(array($message,$id_rec,$id_candidat_postuler));
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

$nom_cand = $bdd->query('SELECT nom_rec FROM recruteurs ORDER BY nom_rec');




?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->

    <link rel="stylesheet" href="interfaceCandidat.css">
    <link rel="stylesheet" href="css/bootstrap.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--<title>Admin Dashboard Panel</title>-->
    <style>

        
        .plan-card {
  background: rgba(0,0,0,0.1);
  width: 15rem;
  padding-left: 2rem;
  padding-right: 2rem;
  padding-top: 10px;
  padding-bottom: 20px;
  border-radius: 10px;
  border-bottom: 4px solid #000446;
  box-shadow: 0 6px 30px rgba(207, 212, 222, 0.3);
  font-family: "Poppins", sans-serif;
  margin-bottom : 20px;
  margin-left : 20px;
  margin-right : 20px;

}

.plan-card h2 {
  /* margin-bottom: 30px; */
  font-size: 27px;
  font-weight: 600;
  /* padding : 10px 10px; */
}

.plan-card  span {
  display: block;
  margin-top: -4px;
  color: #4d4d4d;
  font-size: 12px;
  font-weight: 400;
}
.etiquet-price {
  position: relative;
  background: #fdbd4a;
  width: 14.46rem;
  margin-left: -0.65rem;
  padding: .2rem 1.2rem;
  border-radius: 5px 0 0 5px;
}
.etiquet-price p {
  margin: 0;
  padding-top: .4rem;
  display: flex;
  font-size: 1.9rem;
  font-weight: 500;
}

.etiquet-price p:before {
  content: "DH";
  margin-right: 5px;
  font-size: 15px;
  font-weight: 300;
}

.etiquet-price p:after {
  content: "/ mois";
  margin-left: 5px;
  font-size: 15px;
  font-weight: 300;
}

.etiquet-price div {
  position: absolute;
  bottom: -23px;
  right: 0px;
  width: 0;
  height: 0;
  border-top: 13px solid #c58102;
  border-bottom: 10px solid transparent;
  border-right: 13px solid transparent;
  z-index: -6;
}

.benefits-list {
  margin-top: 16px;
}

.benefits-list ul {
  padding: 0;
  font-size: 14px;
}
.benefits-list ul li {
  color: #4d4d4d;
  list-style: none;
  margin-bottom: .2rem;
  display: flex;
  align-items: center;
  gap: .5rem;
}

.benefits-list ul li svg {
  width: .9rem;
  fill: currentColor;
}

.benefits-list ul li span {
  font-weight: 300;
}

.button-get-plan {
  display: flex;
  justify-content: center;
  margin-top: 1.2rem;
  
}

.button-get-plan a {
    background-color: steelblue !important;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #000446;
  color: white !important;
  padding: 10px 15px;
  border-radius: 5px;
  text-decoration: none;
  font-size: .8rem;
  letter-spacing: .05rem;
  font-weight: 500;
  transition: all 0.3s ease;
}

.button-get-plan a:hover {
  transform: translateY(-3%);
  box-shadow: 0 3px 10px rgba(207, 212, 222, 0.9);
  color: white !important;

}

.button-get-plan .svg-rocket {
  margin-right: 10px;
  width: .9rem;
  fill: currentColor;
}
.spanh2{
    margin-bottom:15px;
}

/* *******************MESSAGERIE******************* */
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
                <li>
                <?php
           $id= $_SESSION['id_candidat_postuler'];
			$query=$conn->query("select * from cv where id_cand='$id'");
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			
                <a href="download.php?filename=<?php echo $name;?>&f=<?php echo 
                    $row['fname'] ?>">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">
			
					<?php echo $name ;?>
			<?php 
        
        }
        ?>
      

                  </a>  </span>
                </li>
               
                <li><a href="#">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Like</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Comment</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name"><b>Votre Score : </b> <?php include('scoring.php') ?></span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
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
                     
                     $name = $_SESSION['namess'];
                     $pass = $_SESSION['password'];

                     $query ="SELECT  * FROM candidats where nom_cand='$name' and mdps_cand='$pass' LIMIT 1" ;
                     $statement = $conn->prepare($query);
                     $statement->execute();

                     $result = $statement->fetchAll();
                     if($result)
                     {
                         
                         foreach($result as $row){

                            $_SESSION['id_candidat_postuler']=$row['id'];

                             ?>
         <span><b> <?php echo $row['nom_cand'].' '.$row['prenom_cand'];} }?></b></span>

       
            <img style="background-color: steelblue;" src="user.png" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                <div class="box box1">
                        <img src="recruteur.png" alt="" class="img-dash">
                        <span class="text">Total Recruteur</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box box2">
                        <img src="offre.png" alt="" class="img-dash">
                        <span class="text">Total offres</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <img src="candidat.png" alt="" class="img-dash">
                        <span class="text">Total Candidat</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Les offres Actuelles </span>
                   
                </div>

                <?php if(isset($_SESSION['postuler'] )) :?>
                   <h5 class="alert alert-success"><?= $_SESSION['postuler']; ?> </h5>
             <?php  
             unset($_SESSION['postuler']);
            endif; ?>

                <div class="row justify-content-between">
                <?php
            
            $query ="SELECT  * FROM offres ";
            $statement = $conn->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();

            if($result)
            {
                foreach($result as $row){
                    ?>

<div class="plan-card col-5 mb-10 ">
    <h2><?= $row['poste']; ?></h2>
    <span class="spanh2">Postulé avant <?= $row['D_expiration']; ?></span>
    <div class="etiquet-price">
        <p><?= $row['salaire']; ?></p>
        <div></div>
    </div>
    <div class="benefits-list">
        <ul>
            <li><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                </svg><span>Domaine : <?= $row['domaine']; ?></span></li>
                <li><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                </svg><span>id-offre : <?= $row['id']; ?></span></li>
            <li><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                </svg><span>Mission : <?= $row['mission']; ?></span></li>
            <li><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                </svg><span>Niveau demandé : <?= $row['niveau_etude']; ?></span></li>
                <li><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                </svg><span>Expérience : <?= $row['experience']; ?></span></li>
                <li><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                </svg><span>Type de contrat : <?= $row['contrat']; ?></span></li>
                <li><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                </svg><span>Languages demandées : <?= $row['languages']; ?></span></li><li><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                </svg><span>Frameworks demandé : <?= $row['frameworks']; ?></span></li>
        </ul>
    </div>
    <div class="button-get-plan">
        <a href="postuler.php?id_offre=<?= $row['id']; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-rocket">
                <path d="M156.6 384.9L125.7 353.1C117.2 345.5 114.2 333.1 117.1 321.8C120.1 312.9 124.1 301.3 129.8 288H24C15.38 288 7.414 283.4 3.146 275.9C-1.123 268.4-1.042 259.2 3.357 251.8L55.83 163.3C68.79 141.4 92.33 127.1 117.8 127.1H200C202.4 124 204.8 120.3 207.2 116.7C289.1-4.07 411.1-8.142 483.9 5.275C495.6 7.414 504.6 16.43 506.7 28.06C520.1 100.9 516.1 222.9 395.3 304.8C391.8 307.2 387.1 309.6 384 311.1V394.2C384 419.7 370.6 443.2 348.7 456.2L260.2 508.6C252.8 513 243.6 513.1 236.1 508.9C228.6 504.6 224 496.6 224 488V380.8C209.9 385.6 197.6 389.7 188.3 392.7C177.1 396.3 164.9 393.2 156.6 384.9V384.9zM384 167.1C406.1 167.1 424 150.1 424 127.1C424 105.9 406.1 87.1 384 87.1C361.9 87.1 344 105.9 344 127.1C344 150.1 361.9 167.1 384 167.1z"></path>
            </svg>
            <span>Postuler</span>
        </a>
    </div>
</div>
                 
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
            // session_unset();
            }
            ?>
           

             
                   
                    </div>
        </div>
        <div class="card" >
        <div class="chat-header"><img style="width: 30px; margin: 0 10px 0 10px ;" src="messager.png" alt="">  Boite Messagerie      <?php if(isset($error)) { echo '     <span style="color:red">'.$error.'</span>'; } ?>
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




?>

<div class="chat-window" >
<ul class="message-list">
   
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


<form method="POST" action="interfaceCandidat.php">
<div class="chat-input">

    <label>recruteur:</label>
   
    
    <input type="text" name="destinataire" />
    <br /><br />
    <textarea placeholder="Votre message"  class="message-input" name="message"></textarea>
    <br /><br />
    <input type="submit" class="send-button" value="Envoyer" name="envoi_message" />

    <br /><br />
</form>
</div>
</div >
    </section>
     
<script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="dashboard.js"></script>

</body>
</html>