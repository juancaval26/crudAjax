<?php

require "../baseDatos/bd.php";

$id = $_POST['Aid'];

  $sql = "DELETE FROM estudiantes WHERE Id = '$id'";
  echo mysqli_query($conexion, $sql);
 ?>
