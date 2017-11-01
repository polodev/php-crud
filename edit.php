<?php 
require 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM people WHERE id=$id";
$resource = $connection->query($sql);
$result = $resource->fetch(PDO::FETCH_OBJ);


//to update

if (isset($_POST['name']) && isset($_POST['email'])) {
  $name = trim( $_POST['name'] );
  $email = trim( $_POST['email'] );
  $sql = "UPDATE people SET name='$name', email='$email' WHERE id=$id ";
  if ($connection->query($sql)) {
    header('Location: /show.php');

  }
  
}



require 'header.php';
 ?>
<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      <h2>Edit <strong><?php echo $result->name; ?></strong></h2>
    </div>
    <div class="card-body">
      <form class="form" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input value="<?= $result->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input value="<?php echo $result->email; ?>" type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-info" value="Update">
        </div>
      </form>

      <a class="btn btn-link" href="/">Home page</a>
      
    </div>
  </div>
</div>
<?php require 'footer.php' ?>
