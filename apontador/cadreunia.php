<?php
include '../conexao.php';
$data = $_POST['data'];
$hora = $_POST['hora'];
$id = $_COOKIE['idAtraso'];



$query = "SELECT * FROM alunos WHERE id=".$id;
$dados = mysqli_query($conexao,$query); 
$row=mysqli_fetch_array($dados);

$numSige = $row['numeroSige'];
$curso = $row['curso'];
$serie = $row['serie'];

$query2 = "INSERT INTO reuniao (data,hora,numeroSige, curso, serie) VALUES ('$data','$hora','$numSige','$curso','$serie')";
  $res   = mysqli_query($conexao,$query2) or die(mysqli_error($conexao));
   header('Location: verAtrasos.php?id='.$id);
?>