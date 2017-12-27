<?php
include 'conexao.php';
$data = $_POST['data'];
$hora = $_POST['hora'];
$id = $_COOKIE['idAtraso'];



$query = "SELECT * FROM alunos WHERE id=".$id;
$dados = mysql_query($query,$conexao); 
$row=mysql_fetch_array($dados,MYSQL_ASSOC);

$numSige = $row['numeroSige'];
$curso = $row['curso'];
$serie = $row['serie'];

$query2 = "INSERT INTO reuniao (data,hora,numeroSige, curso, serie) VALUES ('$data','$hora','$numSige','$curso','$serie')";
  $res   = mysql_query($query2, $conexao) or die(mysql_error());
   header('Location: verAtrasos.php?id='.$id);



?>