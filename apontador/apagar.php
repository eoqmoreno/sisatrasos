<?php 
include 'conexao.php';

?>


<?php 


$id = $_REQUEST["id"];

$query = "DELETE FROM `detes` WHERE id=".$id;
mysql_query($query, $conexao);
header("Location: editarcodigo.php");
?>
