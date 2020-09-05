<?php include("connect.php"); ?>

<?php include("includes/header.php") ;?>
<div class="container">
    <div class="row">
        <div class="col-md-4 my-3">
            <?php
            if(isset($_SESSION['message'])){  ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                   </button>
                </div>
            <?php session_unset(); }; ?>
           

            <div class="card card-body">
                <div class="card card-header bg-dark text-white">
                    Send your task
                </div>
                <form action="procesador.php" method="POST" >
                    <div class="form-group my-3">
                        <input type="text" name="nombre"
                        class="form-control" autofocus placeholder="Name">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" 
                         class="form-control" placeholder="Description" ></textarea>
                    </div>
                    <input name="enviar" type="submit" value="Save Info" 
                     class="btn btn-success btn-block"  >
                </form>
            </div>
        </div>
        <div class="col md-8 my-3">
        <div class="container">
            <table class="table table-bordered" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $query = "SELECT * FROM tabla";
                          $result =  mysqli_query($conn , $query);
                          while($row = mysqli_fetch_array($result)){  ?>
                              <tr>
                                  <th><?php echo$row['nombre']; ?></th>
                                  <th><?php echo$row['description']; ?></th>
                                  <th><?php echo$row['created_at']; ?></th>
                                  <th>
                                      <a class="btn btn-info" href="edit.php?id=<?php echo$row['id']; ?>"><i class="fas fa-marker"></i></a>
                                      <a class="btn btn-danger" href="delete.php?id=<?php echo$row['id']; ?>"><i class="fas fa-trash-alt"></i></a>


                                  </th>

                              </tr>
                          <?php }; ?>
                   
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ; ?>

