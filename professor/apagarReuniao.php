<?php 
include '../conexao.php';

$id = $_REQUEST["id"];
$query = "DELETE FROM reuniao WHERE id=$id";
mysqli_query($conexao,$query);
header("Location: index.php");
?>
