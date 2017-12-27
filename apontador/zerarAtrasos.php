<?php 
include 'conexao.php';
$query2 = "SELECT * FROM alunos";
$dados = mysql_query($query2,$conexao);

$query3 = "SELECT * FROM atraso";
$dados = mysql_query($query3,$conexao); 
$situacao = 1;


$query = "UPDATE atraso SET antigo = 1";
mysql_query($query) or die($query."<br>".mysql_error());

$query = "UPDATE alunos SET qtdAtraso = 0";
mysql_query($query) or die($query."<br>".mysql_error());

header('Location: index.php');



?>