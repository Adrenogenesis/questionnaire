<?php
include ('php/connect.php');
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

<div class="selector" >
		<select id="selectid" name="category" onchange="fx()">
			<option id="Defaut" value="Defaut" selected>Catégorie</option>
            <option id="logic" value="logic" onclick="newDoc()">
            
            <?php $stmt = $pdo->query("SELECT * FROM `questionnaire` WHERE `categorie` LIKE 'Log%' ");
while ($row = $stmt->fetch()){ 
    echo $row['categorie'];}?>
                <?php $stmt1 = $pdo->query("SELECT link FROM `questionnaire` WHERE `categorie` LIKE 'Log%' ");
while ($row1 = $stmt1->fetch())
{ 
echo $row1['link'];
   // echo $row1["<a href=' . $link . '></a>"];}
 //  echo $link;
   ?>
</option>
			<option id="language" value="language"><?php $stmt = $pdo->query("SELECT * FROM `questionnaire` WHERE `categorie` LIKE 'Lan%' ");
while ($row = $stmt->fetch()){ echo $row['categorie'];}?></option>
			<option id="code" value="code"><?php $stmt = $pdo->query("SELECT * FROM `questionnaire` WHERE `categorie` LIKE 'Cod%' ");
while ($row = $stmt->fetch()){ echo $row['categorie'];}?></option>
            </select>

</div>
          
<script>

    function newDoc() {
  window.location.assign("https://www.w3schools.com")
}

</script>   

		

        <footer>
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