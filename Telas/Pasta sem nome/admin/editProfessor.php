<?php 
include '../conexao.php';

$id = $_REQUEST["id"];
$nome = $_REQUEST["nome"];
$curso = $_REQUEST["curso"];
$serie = $_REQUEST["serie"];
$telefone = $_REQUEST["telProfessor"];
$imagem = $_FILES["image"]['tmp_name'];

$local_original=$_REQUEST["img_name"];

	//$local = '../fotos/professor/'.$id.'.png';
	$local=$local_original;
	if(file_exists($local)){
	unlink($local);
	copy($imagem,$local);
	}else{
	copy($imagem,$local);
	}
	
if(isset($local)) {
$query = "UPDATE professor SET nome='".$nome."',imagem='".$local."',curso='".$curso."',serie='".$serie."' ,telefone='".$telefone."' WHERE id=".$id;
}
else {
	$query = "UPDATE professor SET nome='".$nome."',curso='".$curso."',serie='".$serie."' ,telefone='".$telefone."' WHERE id=".$id;
}

mysqli_query($conexao,$query) or die(mysqli_error($conexao));
header("location: index.php");
?>