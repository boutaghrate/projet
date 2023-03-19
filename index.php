<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="index.css">
    <title>Page Principal</title>
</head>
<body data-bs-spy="scroll" data-bs-target="#navId">

<nav>
  <div id="navId">
    <ul>
        <li><img id="logo" style="height: 80px; width: 80px; background-color:  steelblue;" src="logo_vert-removebg-preview.png" alt=""></li>
    </br> 
      <li><a href="#acceuil"><img id="home" src="accueil.png">Accueil</a></li>
      <li><a href="#service"><img id="home" src="service-clients.png">Services</a></li>
      <li><a href="#propos"><img id="home" src="a-propos.png">À propos</a></li>
      <li><a href="#contact"><img id="home" src="formulaire-de-contact.png">Contact</a></li>   
    </ul>
</div>

       <button  value="Inscription" class="bt">
                <a href="signup_candidat.php">Inscription</a>
            </button> 
   
        <button value="Connexion" id="bt1" class="bt">
                <a href="login_candidat.php">Connexion</a>
            </button>&nbsp;
       
  </nav>
  
  <marquee behavior="" direction=""> </marquee>
<div id="accueil">
  <div id="principal" >
    <div  class="epace_recruteur">
      <h2> Espace Recruteur :</h2> <hr>
      <span>Un outil simple et rapide pour recruter</span> <br>
      <span>Trier, Contactez, Recruter</span> <br>
      <button id="btn3"><a href="login_recruteur.php">Connexion Recruteur</a> </button>
      
    </div>
    <div class="photo_back">
              <img  id="img1"  src="conseil-gestion-candidature-e1495032739419 (2).png" alt="">
    </div>
  </div>
</div>


  <div id="propos" class="infos container">

    <div class="row justify-content-between" >

      <div class="col-6 col-sm-12 col-xl-3">
        <div class="card">
          <div class="card-image"> <img id="carta" src="vecteur-d-icone-collaboration-professionnelle-pour-la-conception-graphique-le-logo-le-site-web-les-medias-sociaux-l-application-mobile-illustration-de-l-interface-utilisateur-2gf25rn.jpg"></div>
          <div class="category">Notre Historique  </div>
          <div class="heading"> Les sites web de recrutement en ligne ont connu une croissance rapide depuis leur apparition à la fin d ...
              <div class="author"> By <span class="name">Laila Alahiane </span> Yesterday</div>
          </div>
      </div>
      </div>
      <div class="col-6 col-sm-12 col-xl-3">
        <div class="card">
          <div class="card-image"><img id="carta" src="images.png"></div>
          <div class="category">Notre Actualité  </div>
          <div class="heading"> Le développement de ces sites a été rendu possible grâce à l'essor d'Intern...
              <div class="author"> By <span class="name">ALI ATATTOU</span> 4 days ago</div>
          </div>
      </div>
      </div>
      <div class="col-6 col-sm-12 col-xl-3">
        <div class="card">
          <div class="card-image"><img id="carta" src="360_F_129890424_dQ39vsKtraoF7spfCNZOSLNKOvaYKKZo.jpg"></div>
          <div class="category"> Notre Collaboration </div>
          <div class="heading"> Aujourd'hui, les sites de recrutement en ligne sont devenus des outils indispensables pour les employeurs et les...
              <div class="author"> By <span class="name">Abir</span> 1 week ago</div>
          </div>
      </div>
      </div>
    </div>
  </div>

  <div id="service" class=" row justify-content-between">
    <div class="para-text col-7">
      <h2>Nos services :</h2>
      <p>  Un site web de recrutement en ligne offre une multitude de services pour les employeurs et les demandeurs d'emploi. Pour les employeurs, le site web leur permet de publier des offres d'emploi, de trier les candidatures et de communiquer avec les candidats potentiels. Ils peuvent également accéder à des outils de gestion de candidatures, tels que la planification d'entretiens et la gestion des évaluations. Les employeurs peuvent également utiliser des fonctionnalités de recherche avancée pour trouver des candidats qualifiés, en utilisant des filtres tels que l'expérience, l'éducation et les compétences.
  </p>
      <p>Pour les demandeurs d'emploi, le site web de recrutement en ligne permet de consulter des offres d'emploi, de postuler directement en ligne et de suivre l'état de leur candidature. Les demandeurs d'emploi peuvent également créer un profil en ligne avec leur CV et leurs informations personnelles, ce qui peut être utilisé pour postuler à plusieurs offres d'emploi. De plus, certains sites web de recrutement en ligne proposent des outils de formation professionnelle, des conseils sur la recherche d'emploi et des ressources pour améliorer les CV et les lettres de motivation.
  </p>
      
    </div>
    <div class="col-5">
        <div id="slide" class="carousel slide container ">
          <ol class="carousel-indicators">
              <li data-target="#slide" data-slide-to="0" class="active"></li>
              <li data-target="#slide" data-slide-to="1"></li>
              <li data-target="#slide" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="slide1.jpg" class="w-100 car-img">
              </div>
              <div class="carousel-item">
                  <img src="slide2.png" class="w-100 car-img">
              </div>
              <div class="carousel-item">
                  <img src="slide3.jpg" class="w-100 car-img">
              </div>
          </div>
          <a href="#slide" class="carousel-control-next" data-slide="next">
              <span class="carousel-control-next-icon"></span>
          </a>
          <a href="#slide" class="carousel-control-prev" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
          </a>
        </div>
    </div>
  </div>
  

  <footer id="contact">
    
    <h2>Contacter ADMIN</h2>
    
    <form method="post" action="mail.php">
        <input type="text" name="name" placeholder="Nom">
        <input type="text" name="email" placeholder="E-mail">
        <textarea name="message"  cols="10" rows="1" placeholder="Votres message ici ..."></textarea>
        <button type="submit" name="submit" id="bt2">Envoyer</button><br><br><br>
      
    </form>
    <hr>
    <div id="deuxiemeTrait"> </div> 
     <button id="bt2"><a href="login_admin.php">Connexion Admin</a> </button>
    <div id="copyrightEtIcons">
        <div id="copyright">
            <span> Copyright LANTANA() ; 2023</span>
        </div>
        <div id="icons">
            <a href="http://www.facebook.fr"> <img class="social"src="facebook.png" alt=""></a>
            <a href="http://www.linkedin.fr">  <img class="social" src="linkedin.png" alt=""></a>
            <a href="http://www.instagram.fr">   <img class="social" src="instagram.png" alt=""></a>
        </div>
    </div>
</footer> 


  



   <script src="js/popper.min.js"></script>
  <script src="js/jquery-3.6.3.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="index.js"></script>
  </body>
</html>