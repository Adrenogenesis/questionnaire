<?php
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
     echo 'Vous êtes deconnecté!';
   // header('Location: admin.php');
    exit;
}
echo 'Vous êtes connecté!';
?>
<div class="quiz">
<h3>Ajouter une question</h3>

<?php
if(isset($_POST['Mod1'])){
    
    $reponse1 = !empty($_POST['reponse1']) ? trim($_POST['reponse1']) : null;
    $question1 = !empty($_POST['question1']) ? trim($_POST['question1']) : null;  
  
    $sql = "INSERT INTO qu1 (reponse1, question1) VALUES (:reponse1, :question1)";
    
    $stmt = $pdo->prepare($sql);
  
    $stmt->bindValue(':reponse1', $reponse1);
    $stmt->bindValue(':question1', $question1);
     
    $result = $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
    if($result){
      
        echo 'Merci de votre participation !';
    }
 
}
//$sql = "UPDATE qu1 SET reponse1= :reponse1, question1= :question1  WHERE id=:id";
?>
<div class="Mod1">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="question1">Question 1</label>
            <input type="text" id="question1" name="question1"><br>
            <label for="reponse1">Réponse 1</label>
            <input type="text" name="reponse1" id="reponse1"><br>
            <input type="submit" value="Envoyer"  name="Mod1">
</form>
</div>
<?php
if(isset($_POST['Mod2'])){
    
    $reponse1 = !empty($_POST['reponse1']) ? trim($_POST['reponse1']) : null;
    $question1 = !empty($_POST['question1']) ? trim($_POST['question1']) : null;  
    $id1 = !empty($_POST['id1']) ? trim($_POST['id1']) : null; 

    $sql1 = "UPDATE qu1 SET question1='$question1', reponse1='$reponse1' WHERE ID='$id1'";
        
    $stmt1 = $pdo->prepare($sql1);
  
    //$stmt1->bindValue(':reponse1', $reponse1);
    $stmt1->bindValue(':question1', $question1);
     
    $result1 = $stmt1->execute();

    $row = $stmt1->fetch(PDO::FETCH_ASSOC);
      
    if($result1){
      
        echo 'Merci de votre participation !';
    }
 }
?>
</div>
<div class="quiz">
<h3>Modifier une question</h3>
<div class="Mod2">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="question1">Question 1</label>
            <input type="text" id="question1" name="question1"><br>
            <label for="reponse1">Réponse 1</label>
            <input type="text" name="reponse1" id="reponse1"><br>
            <label for="id1">Id</label>
            <input type="text" name="id1" id="id1"><br>
            <input type="submit" value="Envoyer"  name="Mod2">
</form>
</div>
</div>