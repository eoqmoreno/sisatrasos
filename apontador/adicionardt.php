<?php 
include '../conexao.php';

if(count($_POST) > 0){
$nome = $_POST["nome"];
$imagem = $_FILES["foto"];
$serie = $_POST['serie'];
$curso = $_POST["curso"];
$telefone = $_POST["telefone"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
echo $serie;

if($imagem != NULL) { 
	$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal); 
		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 

 $query = "INSERT INTO detes (nome, imagem, serie, curso, telefone, usuario, senha) VALUES ('$nome','$mysqlImg','$serie','$curso','$telefone','$usuario','$senha')";
 $res   = mysqli_query($conexao,$query);
  if($res){
    echo "Dados inseridos com sucesso";
  }else{
    echo "Falha ao tentar inserir dados";
  }
}
		unlink($nomeFinal);
		header("location:exibir.php");
	}
	else { 
	echo"Você não realizou o upload de forma satisfatória."; 
} 
} 
?>