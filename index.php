<?php
//register.php
 
/**
 * Start the session.
 */
session_start();
/**
 * Include our MySQL connection.
 */
require "php/connect.php";
  
//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if(isset($_POST['register'])){
    
    //Retrieve the field values from our registration form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    //TO ADD: Error checking (username characters, password length, etc).
    //Basically, you will need to add your own error checking BEFORE
    //the prepared statement is built and executed.
    
    //Now, we need to check if the supplied username already exists.
    
    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If the provided username already exists - display error.
    //TO ADD - Your own method of handling this error. For example purposes,
    //I'm just going to kill the script completely, as error handling is outside
    //the scope of this tutorial.
    if($row['num'] > 0){
        die('That username already exists!');
    }
    
    //Hash the password as we do NOT want to store our passwords in plain text.
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    //Prepare our INSERT statement.
    //Remember: We are inserting a new row into our users table.
    $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $stmt = $pdo->prepare($sql);
        
    //Bind our variables.
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':email', $email);
 
    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        echo 'Merci de votre inscription.';
    }
    
}
 // login ------------------------------------------------------------------>
  
//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_POST['login'])){
    
    //Retrieve the field values from our login form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    
    //Retrieve the user account information for the given username.
    $sql = "SELECT id, username, password, email FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Combinaison incorrecte nom / mot de passe !');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
            
            //Redirect to our protected page, which we called home.php
            header('Location: login.php');
            exit;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
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
      <div class="title"><h1>Quiz utilisateur</h1>
      <hr>
     <h2><a href="quest.php">Accéder au Questionnaire</a></h2>
    </div>   
    <div class="login">
        <div class="enr">
    <h3>Enregistrement</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="row">
    <div class="col-25">
            <label for="username">Pseudo</label>
    </div>
    <div class="col-75">
            <input type="text" id="username" name="username"><br>
    </div>
        </div>
        <div class="row">
    <div class="col-25">
            <label for="password">Mot de passe</label>
    </div>
    <div class="col-75">
            <input type="text" id="password" name="password"><br>
    </div>
        </div>
        <div class="row">
    <div class="col-25">
            <label for="email">Email</label>
    </div>
    <div class="col-75">
            <input type="email" id="email" name="email" required><br>
    </div>
        </div>
        <div class="row">
            <input type="submit" name="register" value="Inscription"></button>
        </div>
        </form>
        </div>
    <div class="cnx">
        <h3>Connexion</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="row">
    <div class="col-25">
            <label for="username">Pseudo</label>
    </div>
    <div class="col-75">
            <input type="text" id="username" name="username"><br>
    </div>
        </div>
        <div class="row">
    <div class="col-25">
            <label for="password">Mot de passe</label>
    </div>
    <div class="col-75">
            <input type="text" id="password" name="password"><br>
    </div>
        </div>
        <div class="row">
    <div class="col-25">
            <label for="email">Email</label>
    </div>
    <div class="col-75">
            <input type="email" id="email" name="email" required><br>
    </div>
        </div>
        <div class="row">
            <input type="submit" name="login" value="Connexion"></button>
        </div>
        </form>
    </div>
</div>
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
     <footer>
     <a href="admin.php">Administration</a><br>
        <a href="logout.php">Déconnexion</a><br>
			<span class="lien"class="lien" href="#">Copyright © 2019 - BRODAR Frederic</span>
			<a class="lien" href="">Mentions légale</a>
		</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
