<?php
session_start(); 

include '../conexao.php';
$usuario = $_SESSION['usu'];
$senha = $_SESSION['sen'];
$sql = mysqli_query($conexao,"SELECT * FROM professor WHERE usuario = '$usuario' AND senha = '$senha'");
$row=mysqli_fetch_array($sql);
$nome = $row['nome'];
$curso = $row['curso'];
$img = $row['imagem'];
$serie = $row['serie'];
$tipo = "asd";

setcookie("cursoDT", $curso);
setcookie("serieDT", $serie);

if(!isset($_SESSION['usu']) and !isset($_SESSION['sen'])) {
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<?php
include '../header.php';
?>
<head>
	<title>Página Professor DT</title>
</head>
<body>

<ul class="list-inline text-center bg-cinza pt-1 pb-1">			 
            <li class="list-inline-item"><a class="laranja" href="paraHoje.php">Reuniões para hoje</a></li>
	    <li class="list-inline-item"><a class="laranja" href="reuniao.php">Reuniões Marcadas</a></li>
	    <li class="list-inline-item"><a class="laranja" href="minhaTurma.php">Minha Turma</a></li>
	    <li class="list-inline-item"><a class="laranja" href="atrasosJustificados.php">Atrasos Justificados</a></li>
            <li class="list-inline-item"><a class="laranja" href="sair.php">Sair</a></li>
</ul>

</body>
</html>