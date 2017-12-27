<?php
include '../conexao.php';

$email = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = mysqli_query($conexao,"SELECT * FROM professor WHERE usuario = '$email' AND senha = '$senha'")or die(mysqli_error($conexao));
$row=mysqli_fetch_array($sql);
$rows = mysqli_num_rows($sql);
$curso = "indexDT.php?curso=".$row["curso"];
SESSION_START();
$_SESSION["usu"] = $_POST["usuario"];
$_SESSION["sen"] = $_POST["senha"];
setcookie('user',$email);
if($rows > 0 ){
header('location:../professor');
}else{
header('location:../index.php');
}
?>
