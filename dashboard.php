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
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Dashboard Panel</title> 
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
                <li><a href="logout3.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name" > Logout</span>
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
                     
                        $name = $_SESSION['name'] ;
                        $query ="SELECT  * FROM admin where name_admin='$name' " ;
                        $statement = $conn->prepare($query);
                        $statement->execute();

                        $result = $statement->fetchAll();
                        if($result)
                        {
                            
                            foreach($result as $row){
                                ?>
            <span><h3><b> <?= $row['name_admin'];} }?></b></h3></span>
            <img style="background-color: steelblue; " src="user.png" alt="">
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
            <?php if(isset($_SESSION['message'] )) :?>
                   <h5 class="alert alert-success"><?= $_SESSION['message']; ?> </h5>
             <?php  
             unset($_SESSION['message']);
            endif; ?>
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">List Recruteur </span>
                    <button><a href="SignupRec_admin.php">+Ajouter Recruteur</a> </button>

               
            
                </div>

                <div class="activity-data">
                    <table>
                        <tr>
                            <td>id</td>
                            <td>Nom Complet</td>
                            <td>Gmail</td>
                            <td>ville</td>
                            <td>Société</td>
                            <td>Site entreprise</td>
                            <td>modifier</td>
                            <td>delete</td>
                        </tr>
                        <?php
                        $query ="SELECT  * FROM recruteurs";
                        $statement = $conn->prepare($query);
                        $statement->execute();

                        $result = $statement->fetchAll();
                        if($result)
                        {
                            foreach($result as $row){
                                ?>
                                <tr>
                                   <td><?= $row['id']; ?></td>
                                   <td><?php echo $row['nom_rec'].' '.$row['prenom_rec']; ?></td>
                                   <td><?= $row['gmail_rec']; ?></td>
                                   <td><?= $row['ville_rec']; ?></td>
                                   <td><?= $row['nom_entrep']; ?></td>
                                   <td><a href="<?= $row['site_entrep']; ?>"><?= $row['site_entrep']; ?></a></td>
                                   <td><button style="background: orange;"><a href="update_rec.php?id=<?= $row['id']; ?>">update</a> </button></td>
                                   <td> 
                                    <form action="code_rec.php" method="post">
                                        <button type="submit" name="delete_rec" value="<?=$row['id']; ?>">Delete</button>
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
                            <td colspan="8">No Record found</td>
                        </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>
            </div>
            <br> <br>
<hr>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">List des offre disponibles </span>
                    <!-- <button><a href="creation_offre.php">+ajouter offre</a> </button> -->
                </div>

                <div class="activity-data">
                   
                        <table>
                        <tr>
                            <td>Id-Offre</td>
                            <td>Poste</td>
                            <td>Domaine</td>
                            <td>Experience</td>
                            <td>Salaire</td>
                            <td>Ville</td>
                            <td>Date expiration</td>
                            <td>Id-recruteur</td>
                            <td>Update</td>
                            <td>delete</td>
                        </tr>
                        <?php
            
                        $query ="SELECT  * FROM offres ";
                        $statement = $conn->prepare($query);
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
                                   <td><?= $row['id_rec']; ?></td>

                                   <td><button style="background: orange;"><a href="update_offre_admin.php?id=<?= $row['id']; ?>">update</a> </button></td>
                                   <td> 
                                    <form action="code_offre_admin.php" method="post">
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
                    <span class="text">List Candidat </span>
                    <button><a href="signup_candidat.php">+ajouter Candidat</a> </button>
                    <?php if(isset($_SESSION['message1'] )) :?>
                   <h5 class="alert alert-success"><?= $_SESSION['message1']; ?> </h5>
             <?php  
             unset($_SESSION['message1']);
            endif; ?>
                </div>

                <div class="activity-data">
                    <table>
                        <tr>
                            <td>ID</td>
                            <td>Nom Complet</td>
                            <td>CNE</td>
                            <td>E-mail</td>
                            <td>ville</td>
                            <td>Date Naiss</td>
                            <td>sexe</td>
                            <td>update</td>
                            <td>delete</td>
                        </tr>
                        <?php
                        $query ="SELECT  * FROM candidats";
                        $statement = $conn->prepare($query);
                        $statement->execute();

                        $result = $statement->fetchAll();
                        if($result)
                        {
                            foreach($result as $row){
                                ?>
                                <tr>
                                   <td><?= $row['id']; ?></td>
                                   <td><?php echo $row['nom_cand'].' '.$row['prenom_cand']; ?></td>
                                   <td><?= $row['cne_cand']; ?></td>
                                   <td><?= $row['gmail_cand']; ?></td>
                                   <td><?= $row['ville_cand']; ?></td>
                                   <td><?= $row['date_naiss']; ?></td>
                                   <td><?= $row['sexe_cand']; ?></td>

                                   <td><button style="background: orange;"><a href="update_cand.php?id=<?= $row['id']; ?>">update</a> </button></td>
                                   <td> 
                                    <form action="code_cand.php" method="post">
                                        <button type="submit" name="delete_cand" value="<?=$row['id']; ?>">Delete</button>
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

            
        </div>
    </section>

    <script src="dashboard.js"></script>
</body>
</html>

