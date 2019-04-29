<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
    <title>Validation</title>
    <meta name="keywords" content="simulateur, barbe, simulateur de barbe, webcam, direct webmaster, webmaster, développeur, développeur web, aformac">
    <meta name="author" content="Brodar Frédéric">
    <meta name="publisher" content="Brodar Frédéric">
    <meta name="language" content="fr" >
    <meta name="distribution" content="global" >
    <meta name="expires" content="never">
    <meta name="Robots" content="index, follow">
    <link rel="author" href="dcl.fredb@18pixel.fr">
    <meta name="copyright" content="BRODAR-2019">
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:title" content="Simulateur de barbe"/>
    <meta property="og:description" content="Simulateur de barbe"/>
    <meta property="og:url" content="https://info.exonet3i.com/directweb/">
    <meta property="og:site_name" content="dcl.pfcv.18pixel" />
    <meta property="article:publisher" content="Brodar Frédéric" />
    <meta property="og:image" content="https://dcl.pfcv.18pixel.fr/dcl.fredb/img/brodar.jpg">
    <meta name="twitter:image:src" content="http://www.exonet3i.com/images/exonet3i.jpg">
    <meta name="twitter:domain" content="http://www.exonet3i.com/">
    <meta name="twitter:creator" content="@exonet3i">
    <meta name="twitter:image" content="http://exonet3i.com/images/exonet3i.jpg">
    <meta name="twitter:url" content="https://twitter.com/exonet3i">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h1>Configuration de la base de donnée.</h1><br>
  
<?php

 // utilisation d'un fichier Json pour récupérer les informations de connexion
 // jsondb.json sera supprime par le suite, pour des raisons de securite.

 $file_json = file_get_contents("jsondb.json");
 $parsed_json = json_decode($file_json, true);

 $servername = $parsed_json['servername'];
 $username = $parsed_json['username'];
 $password = $parsed_json['password'];
 
// Creation de la connexion
$conn = new mysqli($servername, $username, $password);
 // Controle de la connexion
if ($conn->connect_error) {
die("La connexion à échouée: " . $conn->connect_error);
} 
$dbname = $parsed_json['dbname'];
// Creation de la base de donnee "DBName"
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($sql) === TRUE) {
    echo 'Base de donnée crée !'.'<br>';
} else {
    echo "Erreur création base de donnée !: " . $conn->error;
}

$conn->close();

$file_json = file_get_contents("jsondb.json");
$parsed_json = json_decode($file_json, true);

$servername = $parsed_json['servername'];
$username = $parsed_json['username'];
$password = $parsed_json['password'];
$dbname = $parsed_json['dbname'];

// Creation de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("La connexion à échouée: " . $conn->connect_error);
} 

$sql = "CREATE TABLE IF NOT EXISTS admindb (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    hostname VARCHAR(20) NOT NULL,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(60) NOT NULL,
    dbname VARCHAR(60) NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo 'Table admindb crée !'.'<br>';
    } else {
        echo "Erreur création table admindb: " . $conn->error;
    }

$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);
    // Controle de la connexion
    if ($conn->connect_error) {
        die("La connexion à échouée: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO admindb (hostname,username,password,dbname) VALUES ('$servername','$username','$password','$dbname')"; 


    if ($conn->query($sql) === TRUE) {
        echo 'Toutes les données utilisateur de la base de donnée ont été importées !'.'<br>'.'<br>';
     } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
 ?>

<div class="quest">
  
<?php 
// Création de la table user ------------------------------------------------------------------------------------> 

   require "connectdb.php";

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        admins VARCHAR(20) NOT NULL,
        username VARCHAR(20) NOT NULL,
        password VARCHAR(60) NOT NULL,
        email VARCHAR(60) NOT NULL
        )";
        
        if ($conn->query($sql) === TRUE) {
            echo 'Table users crée.'.'<br>';
        } else {
            echo "Erreur lors de la création de la table users: " . $conn->error;
        }
  
    $conn->close();

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("La connexion à échouée: " . $conn->connect_error);
    } 

// Creation de la table Statutquiz.
$sql = "CREATE TABLE IF NOT EXISTS Statutquiz (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(50) NOT NULL,
    inputType VARCHAR(50) NOT NULL
    )";
   
    if ($conn->query($sql) === TRUE) {
        echo "Table Statutquiz crée."."<br>";
    } else {
        echo "Erreur création table Statutquiz: " . $conn->error;
    }
      
    $conn->close();

    $conn = new mysqli($servername, $username, $password, $dbname);
   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Creation de la table qu1.
    $sql = "CREATE TABLE IF NOT EXISTS qu1 (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    reponse1 VARCHAR(250) NOT NULL,
    question1 VARCHAR(250) NOT NULL,
    categorie VARCHAR(250) NOT NULL
    )";
   
    if ($conn->query($sql) === TRUE) {
        echo "Table qu1 crée."."<br>";
    } else {
        echo "Erreur création table qu1: " . $conn->error;
    }
      
    $conn->close();

    $conn = new mysqli($servername, $username, $password, $dbname);
   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

// Insertion des elements de base pour la simulation ---------------------------------------------------------------------------------->

    $sql = "INSERT INTO qu1 (reponse1,question1,categorie) VALUES ('Paris','Quelle est la capitale de la France ?','Moyen')";
    $link_address = '../index.php';

    if ($conn->query($sql) === TRUE) {
        echo 'Toutes les questions de base ont été importées !'.'<br>'.'<br>';
        //echo "<a href='$link_address'>Acceuil</a>";
        echo '
        <div class="flash-button">               
        <a href='.$link_address.'>Acceuil</a>
        </div>';
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }


    
?>

</div>
<footer>
     <span class="lien"class="lien" href="#">Copyright © 2019 </span>
     <a class="lien" href="../conditions-utilisation.html">Conditions d'utilisation</a>
        </footer>
</div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>