<?php 
include 'conexao.php';

?>
<?php 
$id = $_REQUEST["id"];
$nome = $_REQUEST["nome"];
$curso = $_REQUEST["curso"];
$serie = $_REQUEST["serie"];
$telefone = $_REQUEST["telefone"];
$usuario = $_REQUEST["usuario"];
$senha = $_REQUEST["senha"];
$imagem = $_FILES["foto"];

if($imagem != NULL) {
	$nomeFinal = time().'.jpg';
	$local = '../fotos/professor/'.$id.'.png';
	copy($imagem,$local);
}

if(isset($local)) {
$query = "UPDATE professor SET nome='".$nome."',imagem='".$local."',curso='".$curso."',serie='".$serie."' ,telefone='".$telefone."',usuario='".$usuario."',senha='".$senha."' WHERE id=".$id;
}
else {
	$query = "UPDATE professor SET nome='".$nome."',curso='".$curso."',serie='".$serie."' ,telefone='".$telefone."',usuario='".$usuario."',senha='".$senha."' WHERE id=".$id;
}
}

mysqli_query($conexao,$query) or die(mysqli_error($conexao));
header("Location: index.php");
?>