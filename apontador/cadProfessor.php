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

	$local = '../fotos/professor/'.$numeroSige.'.png';
	copy($imagem,$local);

 $query = "INSERT INTO detes (nome, imagem, serie, curso, telefone, usuario, senha) VALUES ('$nome','$local','$serie','$curso','$telefone','$usuario','$senha')";
 $res   = mysqli_query($conexao,$query);
  if($res){
    echo "Dados inseridos com sucesso";
  }else{
    echo "Falha ao tentar inserir dados";
  }
?>