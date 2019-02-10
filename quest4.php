<?php
include ("php/connect.php");
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
<div class="quest">

<?php

if(isset($_POST['Quest3'])){
    
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
          
    $sql = "INSERT INTO Statutquiz (username) VALUES (:username)";
    $stmt = $pdo->prepare($sql);
  
    $stmt->bindValue(':username', $username);
     
    $result = $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['num'] > 0){
        die('Vous avez déjà répondu à cette question !');
    }
   
    if($result){
      
        echo 'Merci de votre participation !';
    }
 
}
?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="username">Pseudo</label>
            <input type="text" id="username" name="username"><br>
            <label for="réponse">Réponse</label>
            <input type="text" name="inputType" id="inputType">
            <input type="submit" name="Quest3" value="envoyer"></button><br>
        </form><br>

        <select id="category1" name="category1" method="post" >
			<option id="Defaut" value="Defaut" selected>Questions</option>
            <option id="quts1" value="quts1" >
            
            <?php $stmt = $pdo->query("SELECT * FROM `qu1` WHERE `question1` LIKE 'De%'");
while ($row = $stmt->fetch()){ 
    echo $row['question1'];}?></option>

<option id="quts2" value="quts2" >
<?php $stmt = $pdo->query("SELECT * FROM `qu1` WHERE `question1` LIKE 'Qu%'");
while ($row = $stmt->fetch()){ 
    echo $row['question1'];}?></option>

	 </select><br>

<?php
switch($_POST['category1']){
    case 'Defaut':
        echo 'Choisissez une question.';
    break;
    case 'quts1':
            echo '<hr><br>';
            $reponse1 = $_POST['inputType'];
            
            $stmt = $pdo->prepare("SELECT * FROM qu1 WHERE reponse1=?");
            $stmt->execute([$reponse1]);
            $username = $stmt->fetch();
            if ($username) {
                echo 'Votre réponse '. ':' . '<br>' . $reponse1 . '<br>';
                echo 'Bonne réponse !';
            } else {
                echo 'Mauvaise réponse !';
            }
    
             echo '<hr><br>';

    break;
    case 'quts2':
            echo '<hr><br>';
            $reponse1 = $_POST['inputType'];
            
            $stmt = $pdo->prepare("SELECT * FROM qu1 WHERE reponse1=?");
            $stmt->execute([$reponse1]);
            $username = $stmt->fetch();
            if ($username) {
                echo 'Votre réponse '. ':' . '<br>' . $reponse1 . '<br>';
                echo 'Bonne réponse !';
            } else {
                echo 'Mauvaise réponse !';
            }
            
            echo '<hr><br>';
    break;
    default:
        // Something went wrong or form has been tampered.
    }




?>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>