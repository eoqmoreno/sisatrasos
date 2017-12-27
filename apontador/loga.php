<?php
include '../conexao.php';

$user = $_POST["usuario"];
$senha = $_POST["senha"];
$sql = mysqli_query($conexao,"SELECT * FROM apontador WHERE usuario = '$user' AND senha = '$senha'") or die (mysqli_error($conexao));
$rows = mysqli_num_rows($sql);
if($rows > 0 ){
 session_start();
$_SESSION["usuario"] = $_POST["usuario"];
$_SESSION["senha"] = $_POST["senha"];
echo"<script>window.location='index.php';</script>";
}
else{
echo"<script>alert('Algo deu errado! Tem certeza que colocou as informações corretas? Talvez devesse tentar novamente');
	window.location='login.php';
	</script>";
}
?>