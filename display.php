<?php
//require "php/connect-img.php";
// class DisplayDataImageProfile {
// function showImageProfile(){
//     $connection = new Connection();
//     $conn = $connection->getConnection();

//     $id = $_GET['id'];

//     try{
//         //$sqlDisplay = "SELECT photo FROM frofile WHERE id =$id";
//        // $getImage = $conn->prepare($sqlDisplay);
//        // $getImage->execute();
//        // $getImage->fetchAll(PDO::FETCH_ASSOC);

//         $sql = "SELECT * FROM frofile WHERE id = ?";
//         $getImage = $conn->prepare($sqlDisplay);
//         $getImage->execute([$_GET['id']]);
//         header('Content-type: image/png');
//         echo $getImage->fetchColumn();

//         foreach($getImage as $data){
//             header('Content-type: image/png');
//             // echo "<img src='$data'>";
//             echo $data;
//         }

//     }catch (PDOException $e){
//         echo "Error : " + $e->getMessage();
//     }
// }}
// include database connection 

//// CREATE TABLE `images` (
//  `id` int(11) NOT NULL,
//  `name` varchar(32) NOT NULL,
//  `data` longblob NOT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=latin1;

$host = "localhost";
$db_name = "images";
$username = "gen-005";
$password = "x0ER2a(4]n5V";
 
try{
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
 
catch(PDOException $exception){
    //to handle connection error
    echo "Connection error: " . $exception->getMessage();
}

 
// select the image 
$query = "select * from images WHERE id = ?"; 
$stmt = $con->prepare( $query );
 
// bind the id of the image you want to select
$stmt->bindParam(1, $_GET['id']);
$stmt->execute();
 
// to verify if a record is found
$num = $stmt->rowCount();
 
if( $num ){
    // if found
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // specify header with content type,
    // you can do header("Content-type: image/jpg"); for jpg,
    // header("Content-type: image/gif"); for gif, etc.
    header("Content-type: image/png");
    
    //display the image data
    print $row['data'];
    exit;
}else{
    //if no image found with the given id,
    //load/query your default image here
}

?>