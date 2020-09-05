<?php include("connect.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM tabla WHERE id = $id";
    $result = mysqli_query( $conn , $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $description = $row['description'];


    };
};
if(isset($_POST['update'])){
    $nombre = $_POST['nombre'];
    $description = $_POST['description'];

    $query = "UPDATE tabla set nombre = '$nombre', description = '$description' WHERE id = $id";
    $result = mysqli_query( $conn ,$query);
    if(isset($result)){
        $_SESSION['message'] = "Info updated successfully";
        $_SESSION['message_type'] = "warning";
        header("Location:index.php");
    };

    
};

?>

<?php include("includes/header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-5 my-3  mx-auto ">
            <div class=" bg-dark text-white card card-header">Update your info </div>
                <div class="card card-body">
                    <div class="card-card-header">
                        <form action="edit.php?id=<?php echo$_GET['id'];  ?>" method="POST">
                            <div class="form-group">
                                <input name="nombre" value="<?php echo$nombre; ?>" class="form-control" placeholder="Update the name" type="text">
                            </div>
                            <div class="form-group">
                                <textarea name="description" placeholder="Update the info" class="form-control" rows="2"><?php echo$description ?></textarea>
                            </div>
                            <input name="update" value="Click to Update" class="btn btn-success btn-block" type="submit">
                        </form>
                    </div>
                </div>
            
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
