<?php
$host = "localhost";
$db_name = "images";
$username = "gen-005";
$password = "x0ER2a(4]n5V";

try{
    $bdd = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //pour activer l'affichage des erreurs pdo
 } catch(PDOException $e){
      echo 'ERROR: ' . $e->getMessage();
 } 

 try{
    $reponse = $bdd->query('SELECT photo FROM frofile');
  }catch(Exception $e){ //en cas d'erreur dans la requete
    echo "Erreur dans la requete !".$e->getMessage();
  }
  // On affiche chaque entrée une à une
  while ($produits = $reponse->fetch()) {
  
   echo "<table>
          <tbody>
          <tr>
           <td><img widtd='200px' height='200px' src='data:image/jpeg;base64,".base64_encode($produits['photo'])."'></img></td> 
           
          </tr>
          </tbody>
        </table>";
  }
  
  $reponse->closeCursor(); // Termine le traitement de la requête
?>