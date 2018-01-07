<?php
include '../conexao.php';

$nome = $_POST['nome'];
$query = "SELECT * FROM alunos WHERE nome LIKE '$nome%'";
$dados = mysqli_query($conexao,$query) or die(mysqli_error($conexao));
$resultados = mysqli_fetch_array($dados);
$curso = $_POST['curso'];
$serie = $_POST['serio'];
$sige = $resultados['numeroSige'];
$opa = $resultados['qtdAtraso'];
$opa++;
$data = $_POST['data'];
$hora = $_POST['hora'];
$motivo = $_POST['just'];

$query = "INSERT INTO atraso (data,horario,numeroSige,curso,serie,motivo) VALUES ('$data','$hora','$sige','$curso','$serie','$motivo')";
  $res   = mysqli_query($conexao,$query) or die(mysqli_error($conexao));

 $query2 = "UPDATE alunos SET qtdAtraso='$opa' WHERE numeroSige=$sige";
 $res   = mysqli_query($conexao,$query2) or die(mysqli_error($conexao));
 header('Location: ../index.php');


?>