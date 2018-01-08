<?php
include '../conexao.php';
$data = $_POST['data'];
$hora = $_POST['hora'];
$id   = $_POST['id'];
//$id = $_COOKIE['idAtraso'];



$query = "SELECT * FROM alunos WHERE id=".$id;
$dados = mysqli_query($conexao,$query); 
if($dados){
$row=mysqli_fetch_array($dados);

$curso = $row['curso'];
$serie = $row['serie'];
$numSige = $row['numeroSige'];

$query2 = "INSERT INTO reuniao (data,hora,numeroSige, curso, serie) VALUES ('$data','$hora','$numSige','$curso','$serie')";
  $res   = mysqli_query($conexao,$query2) or die(mysqli_error($conexao));
   header('Location: ../index.php');
  }else{
    include '../index.php';
    echo('<h4>ERRO! ID ('.$id.') não encontrado.</h4>');
  }
?>