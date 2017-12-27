<?php 
include 'conexao.php';

?>


<?php 


$id = $_REQUEST["id"];

$query = "DELETE FROM reuniao WHERE id=".$id;
mysql_query($query, $conexao);
header("Location: reuniao.php");
?>
