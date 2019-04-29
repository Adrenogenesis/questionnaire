<?php
require "php/connect.php";
session_start();

if(isset($_POST['login'])){

$admins = !empty($_POST['username']) ? trim($_POST['username']) : null;
$passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
$email = !empty($_POST['email']) ? trim($_POST['email']) : null;

$sql = "SELECT id, username, password, email FROM users WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $admins);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if($user === false){
die('Combinaison incorrecte nom / mot de passe !');
} else{
$validPassword = password_verify($passwordAttempt, $user['password']);

if($validPassword){
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['logged_in'] = time();
     header('Location: quest.php');
    exit;
    
} else{
  
    die('Combinaison incorrecte nom / mot de passe !');
}
}
}
?>
<!DOCTYPE html>
<html lang="fr" class="full-height">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <title>Questionnaire</title>
    <meta name="description" content="Questionnaire" >
    <meta name="keywords" content="">
    <meta name="author" content="Brodar Frédéric">
    <meta name="publisher" content="Brodar Frédéric">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/menu.css">
    </head>
<body> 
<div class="logo">
    <img src="img/logo.jpg" alt="logo">
        </div>
            <div class="container">
                <div class="menu">
                    <nav class="mobile-menu">
                        <label for="show-menu" class="show-menu"><span>Menu</span><div class="lines"></div></label>
                                <input type="checkbox" id="show-menu">
                                <ul id="menu">
                                <li><a href="index.php">Acceuil</a></li>
                                <li><a href="quest.php">Questionnaire</a></li>
                                <li></li>
                                <li></li>
                                <li><a href="categorie.php">Par catégories</a></li>
                                <li></li>
                                <li></li>
                                <li><a href="users.php">Enregistrement</a></li>
                                <li></li>
                                <li></li>
                                <li><a href="admin.php">Administration</a></li>
                                </ul>
                    </nav>
                  </div>
                 <div class="quest">
                 <div class="title"><h2>Quiz catégories</h2>
      <hr></div>
                     <div class="quiz">
                            <?php
                            if(isset($_POST['Quest3'])){
                                
                                $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
                                $inputType = !empty($_POST['inputType']) ? trim($_POST['inputType']) : null;  
                            
                                $sql = "INSERT INTO Statutquiz (username, inputType) VALUES (:username, :inputType)";
                                
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindValue(':username', $username);
                                $stmt->bindValue(':inputType', $inputType);
                                
                                $result = $stmt->execute();

                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                if($row['username'] > 1){
                                    die('Vous avez déjà répondu à cette question !');
                                }
                            
                                if($result){
                                        echo 'Merci de votre participation !';
                                }
                            }
                            ?>
                        <div class="Quest3">  
                            
                        <div class="selector" >
        <select id="selectid" name="category" onchange="fx()">
        <option id="Defaut" value="Defaut" selected>Catégorie</option>
               <option id="logic" value="logic" onclick="qt1()">
               <?php
             $stmt = $pdo->query("SELECT * FROM `qu1` WHERE `categorie` LIKE 'F%' ");
while ($row = $stmt->fetch()){ echo $row['categorie'];}?>
</option>
            <option id="language" value="language" onclick="qt2()"><?php
             $stmt = $pdo->query("SELECT * FROM `qu1` WHERE `categorie` LIKE 'M%' ");
while ($row = $stmt->fetch()){ echo $row['categorie'];}?>
</option>
            <option id="code" value="code" onclick="qt3()"><?php 
            $stmt = $pdo->query("SELECT * FROM `qu1` WHERE `categorie` LIKE 'E%' ");
while ($row = $stmt->fetch()){ echo $row['categorie'];}?>
</option>
        </select>
</div>

<script type="text/javascript">
function qt1(clicked)
{
    window.location = "quest1.php";
	return false;
}
function qt2(clicked)
{
    window.location = "quest2.php";
	return false;
}
function qt3(clicked)
{
    window.location = "quest3.php";
	return false;
}
</script>
        </div>   
             </div>  
               </div>
                      </div>
                         <footer>
                 <a href="logout_users.php">Déconnexion</a><br>
                      <span class="lien"class="lien" href="#">Copyright © 2019 - BRODAR Frederic</span>
                 <a class="lien" href="">Mentions légale</a>
        </footer>
    </body>
</html>