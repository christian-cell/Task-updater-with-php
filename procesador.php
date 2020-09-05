<?php include("connect.php");

if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
     $description = $_POST['description'];

     $query = "INSERT INTO tabla (nombre , description) VALUES 
     ('$nombre','$description') ";
     $result = mysqli_query($conn,$query);

     if(isset($result)){
         echo'enviando';
     };
};

$_SESSION['message'] = "Info sent successfully";
$_SESSION['message_type'] = "success";
header("Location:index.php");


?>