<?php 
include 'conexao.php';

?>


<?php 


$id = $_REQUEST["id"];

$query = "DELETE FROM atraso WHERE id=".$id;
mysql_query($query, $conexao);
header("Location: atrasosJustificados.php");
?>