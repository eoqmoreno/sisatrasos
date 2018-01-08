<?php 
include '../conexao.php';

$nome = $_POST["nome"];
$imagem = $_FILES["foto"]['tmp_name'];
$serie = $_POST['serie'];
$curso = $_POST["curso"];
$telefone = $_POST["telefone"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$confsenha = $_POST["consenha"];

$nomeRandom =md5(sha1($senha.md5($senha).md5($senha).md5($nome),
            md5($nome).md5($senha).md5($senha).$senha));


	$local = '../fotos/professor/'.$nomeRandom.'.png';
	copy($imagem,$local);

if($confsenha == $senha){
 $query = "INSERT INTO professor (nome, imagem, serie, curso, telefone, usuario, senha) VALUES ('$nome','$local','$serie','$curso','$telefone','$usuario','$senha')";
 $res   = mysqli_query($conexao,$query);
    header("location:index.php");
}else{
  echo "<script>
  alert('As senhas não são iguais');
  window.location = 'index.php';
  </script>";
}
?>