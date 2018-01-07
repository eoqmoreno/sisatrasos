<?php 
include '../conexao.php';

$id = $_REQUEST["id"];

$query = "DELETE FROM atraso WHERE id=$id";
mysqli_query($conexao,$query);
header("Location: index.php");
?>
