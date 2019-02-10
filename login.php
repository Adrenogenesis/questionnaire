<?php
require "php/connect.php";
//home.php
 
/**
 * Start the session.
 */
session_start();
 
 
/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}
 
 
/**
 * Print out something that only logged in users can see.
 */
 
echo 'Vous êtes connecté!';
 
?>
<!DOCTYPE html>
<html lang="fr" class="full-height">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="" type="image/x-icon"/>
    <title>Questionnaire</title>
    <meta name="description" content="Questionnaire" >
    <meta name="keywords" content="">
    <meta name="author" content="Brodar Frédéric">
    <meta name="publisher" content="Brodar Frédéric">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    </head>
<body>  
<div class="logo">
<img src="img/logo.jpg" alt="logo">
</div>
<div class="main">
<div class="login">
        <h1>Connexion</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="username">Pseudo</label>
            <input type="text" id="username" name="username"><br>
            <label for="password">Mot de passe</label>
            <input type="text" id="password" name="password"><br>
            <input type="email" id="email" name="email">
            <label for="email">Email</label>
            <input type="submit" name="login" value="Connexion">
        </form>

    </div>
<div class="quest">

<div class="selector" >
		<select id="selectid" name="category" onchange="fx()">
			<option id="Defaut" value="Defaut" selected>Catégorie</option>
            <option id="logic" value="logic" onclick="qt1()">
            
            <?php $stmt = $pdo->query("SELECT * FROM `questionnaire` WHERE `categorie` LIKE 'Log%' ");
while ($row = $stmt->fetch()){ 
    echo $row['categorie'];}?>

</option>
			<option id="language" value="language" onclick="qt2()"><?php $stmt = $pdo->query("SELECT * FROM `questionnaire` WHERE `categorie` LIKE 'Lan%' ");
while ($row = $stmt->fetch()){ echo $row['categorie'];}?></option>
			<option id="code" value="code" onclick="qt3()"><?php $stmt = $pdo->query("SELECT * FROM `questionnaire` WHERE `categorie` LIKE 'Cod%' ");
while ($row = $stmt->fetch()){ echo $row['categorie'];}?></option>
            </select>

</div>
<a href="quest7.php">quest7</a><br>
  

<footer>
<a href="logout.php">Déconnexion</a><br>
			<span class="lien"class="lien" href="#">Copyright © 2019 </span>
			<a class="lien" href="">Mentions légale</a>
		</footer>

        

</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
