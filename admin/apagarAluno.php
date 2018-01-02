<?php 
include 'conexao.php';

?>


<?php 


$id = $_REQUEST["id"];

$query = "DELETE FROM `alunos` WHERE id=".$id;
mysql_query($query, $conexao);

$query = "SELECT * FROM alunos WHERE id=".$id;
$dados = mysql_query($query);
$resultados = mysql_fetch_object($dados);
$curso = $resultados->curso;
$serie = $resultados->serie;
 header('Location: procuraraluno.php?serio='.$serie.'&curso='.$curso.'');
?>
