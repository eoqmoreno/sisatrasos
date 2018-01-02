<?php 
include 'conexao.php';
$curso = $_COOKIE['curso'];
$serie = $_COOKIE['serie'];

$query = mysql_query("DELETE FROM alunos
WHERE curso='$curso' AND serie='$serie'");
 header('Location: procuraraluno.php?serio='.$serie.'&curso='.$curso.'');
 
?>