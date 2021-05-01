<?php

require "../baseDatos/bd.php";

// es normal que mande un error al ir a la vista ya que los datos estan vacios
// lo mas importante es ver que devuelve el mysqli_query si devuelve un 1 esta bueno
$id = $_POST['Aid'];
$nombre = $_POST['Anombre'];
$documento = $_POST['Adocumento'];
$notaP = $_POST['AnotaP'];
$notaD = $_POST['AnotaD'];
$notaC = $_POST['AnotaC'];
$promedio = ($notaP + $notaD + $notaC) / 3;
$round = round($promedio,1);

$sql = "UPDATE estudiantes SET Documento = '$documento', Nombres = '$nombre', NotaP = '$notaP', NotaD = '$notaD', NotaC = '$notaC', Promedio = '$round' WHERE Id = '$id'";
echo mysqli_query($conexion, $sql);
 ?>
