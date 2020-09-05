<?php include("connect.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE  FROM tabla WHERE id=$id";
    $result = mysqli_query($conn , $query);
    if(isset($result)){
        $_SESSION['message'] ="Info deleted successfully";
        $_SESSION['message_type'] = "danger";
        header("Location:index.php");
    };

};

?>