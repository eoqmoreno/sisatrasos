<?php 
include '../conexao.php';
$query2 = "SELECT * FROM alunos";
$dados = mysqli_query($conexao,$query2);
$query3 = "SELECT * FROM atraso";
$dados = mysqli_query($conexao,$query3); 
$situacao = 1;

$query = "UPDATE atraso SET antigo = 1";
mysqli_query($conexao,$query) or die(mysql_error($conexao));
$query = "UPDATE alunos SET qtdAtraso = 0";
mysqli_query($conexao,$query) or die(mysql_error($conexao));
header('Location: index.php');
?>