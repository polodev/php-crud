<?php 
require 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM people WHERE id=$id";
if ($connection->query($sql)) {
  header('Location: /show.php');
}

 ?>