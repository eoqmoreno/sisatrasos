<?php
include '../conexao.php';



$data = $_POST['data'];
$hora = $_POST['hra'];

if($_POST['motivo']) {
$motivo = $_POST['motivo'];
}

else {
	$motivo = "Falta nao justificada";
}
$sige = $_REQUEST['numeroSige'];
$query = "SELECT * FROM alunos WHERE numeroSige=".$sige;
$dados = mysqli_query($conexao,$query);
$resultados = mysqli_fetch_object($dados);
$curso = $resultados->curso;
$serie = $resultados->serie;
$opa = $resultados->qtdAtraso;
$opa++;

$query = "INSERT INTO atraso (data,horario,numeroSige,curso,serie,motivo) VALUES ('$data','$hora','$sige','$curso','$serie','$motivo')";
  $res   = mysqli_query($conexao,$query) or die(mysql_error());

 $query2 = "UPDATE alunos SET qtdAtraso='$opa' WHERE numeroSige=$sige";
 $res   = mysqli_query($conexao,$query2) or die(mysql_error());
 header('Location: procuraraluno.php?serio='.$serie.'&curso='.$curso.'');


?>