<?php 


try{
    $conn = new PDO("mysql:host=localhost;dbname=projetweb;port=3306;charset=utf8", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch(Exception $e){
    echo $e->getMessage();
    } 

    if(!$conn){
        echo "connexion failed!";
    }
?>