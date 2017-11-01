<?php 
require 'db.php';
$sql = 'SELECT * FROM people ORDER BY id DESC';
$dbpeople = $connection->query($sql);
$results = $dbpeople->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container mt-5">
  <a href="/" class="btn btn-link">Home page</a>
  <?php if (count($results)) : ?>
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
    <?php foreach ($results as $result): ?>
        <tr>
          <td><?php echo $result->id ; ?></td>
          <td><?php echo $result->name ; ?></td>
          <td><?php echo $result->email ; ?></td>
          <td>
            <a class="btn btn-info" href="/edit.php?id=<?= $result->id; ?>">Edit</a> 
            <a onclick="return confirm ('Are you really want to delete this entry ')" class="btn btn-danger deleteClass" href="/delete.php?id=<?= $result->id; ?>">Delete</a>
          </td>
        </tr>
    <?php endforeach ; ?>
  </table>
<?php else: ?>
  <h2>No record found on database</h2>
<?php endif; ?>

  
</div>
<?php require 'footer.php'; ?>