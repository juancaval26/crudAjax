<?php
  require "../baseDatos/bd.php";

// es normal que mande un error al ir a la vista ya que los datos estan vacios
// lo mas importante es ver que devuelve el mysqli_query si devuelve un 1 esta bueno
  $nombre = $_POST['nombre'];
  $documento = $_POST['documento'];
  $notaP = $_POST['notaP'];
  $notaD = $_POST['notaD'];
  $notaC = $_POST['notaC'];
  $promedio = ($notaP + $notaD + $notaC) / 3;
  $round = round($promedio,1);

  $sql = "INSERT INTO estudiantes (Documento, Nombres, NotaP, NotaD, NotaC, Promedio) VALUES('$documento', '$nombre', '$notaP', '$notaD', '$notaC', '$round')";
  echo mysqli_query($conexion, $sql);

 ?>
