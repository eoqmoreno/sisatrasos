<?php 
include '../conexao.php';
$id = $_REQUEST["id"];
$query = "DELETE FROM `alunos` WHERE id=$id";
mysqli_query($conexao,$query);
header('Location:index.php');
?>
