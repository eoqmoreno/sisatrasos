<?php
// Incluir aquivo de conexão
include "../conexao.php";
 
// Recebe a id enviada no método GET
$id = $_GET['id'];
 
// Seleciona a noticia que tem essa ID
$sql = mysqli_query($conexao,"SELECT * FROM alunos WHERE id = '".$id."'");
 
// Pega os dados e armazena em uma variável
$noticia = mysqli_fetch_object($sql);
// Exibe o conteúdo da notica
echo $noticia->conteudo;
 
// Acentuação
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>