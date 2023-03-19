<?php
//database conexion
session_start();
include('db_cand.php');

$conn=new PDO('mysql:host=localhost; dbname=projetweb', 'root', '') or die(mysql_error());
//form submit function apload
if(isset($_POST['submit'])!=""){

  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  $fname = date("YmdHis").'_'.$name;

  $_SESSION['fname']=$fname;

  //check if filename exist
  $chk = $conn->query("SELECT * FROM cv where name = '$name' ")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
    while($c == 0){
        $i++;
        $reversedParts = explode('.', strrev($name), 2);
        //new filename
        $tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
        //check if new filename is still exist in the database
        $chk2 = $conn->query("SELECT * FROM  cv where name = '$tname' ")->rowCount();
        if($chk2 == 0){
            $c = 1;
            $name = $tname;
        }
    }
}
 $move =  move_uploaded_file($temp,"upload/".$fname);

$nom_cand=$_POST['nom_cand'];
$cne_cand=$_POST['cne_cand'];


$rec="SELECT id FROM candidats WHERE nom_cand = :nom_cand AND cne_cand = :cne_cand ";
$statement = $conn->prepare($rec);
$tab=[
    ':nom_cand'=>$nom_cand,
    ':cne_cand'=>$cne_cand,
];
$statement->execute($tab);

$result = $statement->fetchAll();
    
    foreach($result as $row){
            $ido=$row['id'];
            // echo '<br>';
            // echo $ido;
    }



//  if($move){
  
     $stmt = $conn->prepare("INSERT INTO cv (fname, name, id_cand) VALUES (:fname, :name, :ido)");
$stmt->bindParam(':fname', $fname);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':ido', $ido);

// Exécution de la requête
$stmt->execute();


//  }
}
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
    <svg style=" padding-top: 0; " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" id="waves"><path fill="#376f9e" fill-opacity="1" d="M0,64L60,96C120,128,240,192,360,186.7C480,181,600,107,720,112C840,117,960,203,1080,229.3C1200,256,1320,224,1380,208L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
 
    
  <div class="container">
     <div class="login-box">
      <h2 style="text-align: center;">Espace candidat</h2>
      </br>
      <form  action="language.php" method="POST"  class="login" enctype="multipart/form-data">



        <input type="hidden" name="fname" value="<?php echo $_SESSION['fname'];?>">      

        <div  class="form-group langue">
             <select id="language" name="language[]" multiple required >
                <option value="HTML">HTML</option> 
                <option value="CSS">CSS</option>
                <option value="JAVASCRIPT">JAVASCRIPT</option>
                <option value="PHP">PHP</option>
                <option value="PYTHON">PYTHON</option>
                <option value="JAVA">JAVA</option>
                <option value="RUBY">RUBY</option>
                <option value="C++">C++</option>
                <option value="C#">C#</option>
                <option value="Swift">Swift</option>
                <option value="Kotlin">Kotlin</option>
                <option value="Objective-C">Objective-C</option>
                <option value="SQL">SQL</option>
                <option value="Perl">Perl</option>
                <option value="Go">Go</option>
                <option value="MATLAB">MATLAB</option>
                <option value="Scala">Scala</option>
                <option value="Lua">Lua</option>
                <option value="Rust">Rust</option>
                <option value="Dart">Dart</option>
                <option value="Haskell">Haskell</option>
                <option value="F#">F#</option>
                <option value="Groovy">Groovy</option>
                <option value="Cobol">Cobol</option>
                <option value="Fortran">Fortran</option>
                <option value="Prolog">Prolog</option>
                <option value="Ada">Ada</option>
                <option value="Smalltalk">Smalltalk</option>


   

             </select>
          </div>

          <div  class="form-group langue">
             <select id="frameworks" name="frameworks[]" multiple required >
                <option value="BOOTSTRAP">BOOTSRAP</option> 
                <option value="JQUERY">JQUERY</option>
                <option value="NODE">NODE</option>
                <option value="LARAVEL">LARAVEL</option>
                <option value="AngularJS">AngularJS</option>
                <option value="React">React</option>
                <option value="Vue.js">Vue.js</option>
                <option value="Ember.js">Ember.js</option>
                <option value="Backbone.js">Backbone.js</option>
                <option value="Ruby on Rails">Ruby on Rails</option>
                <option value="Django">Django</option>
                <option value="Flask">Flask</option>
                <option value="Laravel">Laravel</option>
                <option value="Symfony">Symfony</option>
                <option value="CodeIgniter">CodeIgniter</option>
                <option value="Koa.js">Koa.js</option>
                <option value="Meteor">Meteor</option>
                <option value="NestJS">NestJS</option>
                <option value="Spring">Spring</option>
                <option value="Hibernate">Hibernate</option>
                <option value="Struts">Struts</option>
                <option value="Flask">Flask</option>
                <option value="Pyramid">Pyramid</option>
                <option value="Zend Framework">Zend Framework</option>
                <option value="CakePHP">CakePHP</option>
                <option value="Play Framework">Play Framework</option>
                <option value="JHipster">JHipster</option>
                <option value="Dropwizard">Dropwizard</option>
             </select>
          </div>        

            <button type="submit" onclick="verifier()" name="submit" class="full-btn">Sign up</button>

      </form>

     </div>

   </div> 
 

 <script src="erreur.js"></script>

</body>
</html>
