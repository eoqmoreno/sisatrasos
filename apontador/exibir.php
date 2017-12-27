<?php

include 'conexao.php';

$res = mysql_query("SELECT * FROM detes");


$sql = "SELECT * FROM detes";
$query = mysql_query($sql);
while($sql = mysql_fetch_array($query)){
$id = $sql["id"];
$nome = $sql["nome"];
}

header("Location: editarcodigo.php")


/*

$busca = mysql_query("SELECT * FROM detes WHERE id='9'");
$dado = mysql_fetch_array($busca);
 
 
$descricao = $dado['nome'];
$valor = $dado['telefone'];
$imagem = '<img src="data:image/jpeg;base64,'.base64_encode($dado['imagem'] ).'" height="200" width="200"/>';
 
echo "Descrição: ".$descricao. " Valor: ".$valor." Imagem:" . $imagem;
*/
?>


