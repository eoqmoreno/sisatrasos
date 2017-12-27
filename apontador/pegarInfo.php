<?php 
include '../conexao.php';
if(count($_POST) > 0){

$nome = $_POST['nome'];
$imagem = $_FILES['foto']['tmp_name'];
$serie = $_POST['serie'];
$numeroSige = $_POST['numeroSige'];
$curso = $_POST['curso'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$telAluno = $_POST['telAluno'];
$telResponsavel = $_POST['telResponsavel'];
$email = $_POST['email'];

$local = '../fotos/aluno/'.$numeroSige.'.png';
copy($imagem,$local);

$query = "INSERT INTO alunos (nome, foto, serie, curso, rg, cpf, telAluno, telResponsavel, email, numeroSige) VALUES ('$nome','$local','$serie','$curso','$rg','$cpf','$telAluno','$telResponsavel','$email','$numeroSige')";
$res  = mysqli_query($conexao,$query);

		if($res) {

echo "<script type='text/javascript'>alert('Cadastro Concluído!');</script>";
header('Location: ../index.php');
}
else {
	echo "<script type='text/javascript'>alert('Cadastro Falhou!');</script>";
}
}
	else { 
	echo"Você não realizou o upload de forma satisfatória."; 
}  
?>