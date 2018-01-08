<?php
include '../conexao.php';

$nome = $_POST['nome'];
$query = "SELECT * FROM alunos WHERE nome LIKE '$nome%'";
$dados = mysqli_query($conexao,$query) or die(mysqli_error($conexao));
$resultados = mysqli_fetch_array($dados);
$curso = $_POST['curso'];
$serie = $_POST['serio'];
$sige = $resultados['numeroSige'];
$atraso = $resultados['qtdAtraso'];
$atraso++;
$data = $_POST['data'];
$hora = $_POST['hora'];
$motivo = $_POST['just'];
$id = $resultados['id'];


$query = "INSERT INTO atraso (data,horario,numeroSige,curso,serie,motivo) VALUES ('$data','$hora','$sige','$curso','$serie','$motivo')";
mysqli_query($conexao,$query) or die(mysqli_error($conexao));

$sql1 = mysqli_query($conexao,"SELECT * FROM atraso WHERE numeroSige = $sige AND motivo = 'nao'");
$results = 0;
while($res = mysqli_fetch_array($sql1)) $results++;
echo $results; 
$query2 = "UPDATE alunos SET qtdAtraso='$atraso' WHERE numeroSige=$sige";
mysqli_query($conexao,$query2) or die(mysqli_error($conexao));

  if($results%4==0)
  header('Location: ../apontador/cadReuniao.php?id='.$id.'&atr='.$results);
  else header('Location: index.php');


?>