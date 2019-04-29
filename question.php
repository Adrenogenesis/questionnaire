<?php
require "php/connect.php";

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
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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
        <li><a href="users.php">Enregistrement</a></li>
        <li></li>
        <li></li>
		<li><a href="admin.php">Administration</a></li>
		</ul>
</nav>
    </div>
<div class="quest">
<div class="quiz">
<?php
if ( isset( $_GET['question'] ) && $_GET['question'] ) {
     $choice = $_GET['question'];
     //echo $choice;
    } else {  
        echo 'Erreur inconnue !';
    }

    echo $choice;
    echo '
    <form action="" method="post">
            <label for="username">Pseudo</label>
            <input type="text" id="username" name="username"><br>
            <label for="réponse">Réponse</label>
            <input type="text" name="inputType" id="inputType">
            <input type="submit" value="submit"  name="Quest">
      </form>';

      if(isset($_POST['Quest'])){
    
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
          
            echo 'Merci de votre participation !'.'<br>';
        }
     
    }

      if (isset ($_POST['inputType'])){
      $reponse1 = $_POST['inputType'];
        $stmt = $pdo->prepare("SELECT * FROM qu1 WHERE reponse1=?");
        $stmt->execute([$reponse1]);
            $username = $stmt->fetch();
        if ($inputType === $reponse1 && $username) {
            echo 'Bonne réponse '. ':' . '<br>' . $reponse1 . '<br>';
   
        } else {
                  echo '<div class="flash-button">Mauvaise réponse !</div>';
                }
        }
?>
      <hr>
     <h2><a href="quest.php">Retour</a></h2>
</div>
</div>
<footer>
 <!-- Include JS file. -->
<a href="logout.php">Déconnexion</a><br>
			<span class="lien"class="lien" href="#">Copyright © 2019 - BRODAR Frederic</span>
			<a class="lien" href="">Mentions légale</a>
		</footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>