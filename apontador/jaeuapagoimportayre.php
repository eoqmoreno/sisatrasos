<?php
include '../conexao.php';


$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$query = "SELECT * FROM administrador WHERE usuario = '$usuario'";
$dados = mysqli_query($conexao,$query); 
$row=mysqli_fetch_array($dados);
	if($row > 0) {
		echo "Usuario existente, escolha outro.";

	}

	else {
		$query = "INSERT INTO administrador
	(nome, 
	endereco, 
	telefone, 
	cpf, 
	rg, 
	usuario, 
	senha) VALUES 
	('$nome',
	'$endereco',
	'$telefone',
	'$cpf',
	'$rg',
	'$usuario',
	'$senha')";

	 $res   = mysqli_query($conexao,$query);
	 header("Location: login.php");
	}
	
 ?>