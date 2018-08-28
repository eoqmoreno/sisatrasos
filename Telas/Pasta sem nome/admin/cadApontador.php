<?php 
include '../conexao.php';
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$usuar = $_POST['usuario'];
$pass1=$_POST['senh1'];
$pass2=$_POST['senh2'];
$nomeResponsavel = $_POST['nomeResponsavel'];


if($pass1 === $pass2){
	$query = "INSERT INTO apontador VALUES (null,'$nome','$telefone','$usuar','$pass1')";
	$res   = mysqli_query($conexao,$query);
	   header("location:index.php");
   }else{
	 echo "<script>
	 alert('As senhas não são iguais');
	 window.location = 'index.php';
	 </script>";
   }


?>