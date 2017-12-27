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
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal); 
		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));


}

if(isset($mysqlImg)) {
$query = "UPDATE detes SET nome='".$nome."',imagem='".$mysqlImg."',curso='".$curso."',serie='".$serie."' ,telefone='".$telefone."',usuario='".$usuario."',senha='".$senha."' WHERE id=".$id;
}
else {
	$query = "UPDATE detes SET nome='".$nome."',curso='".$curso."',serie='".$serie."' ,telefone='".$telefone."',usuario='".$usuario."',senha='".$senha."' WHERE id=".$id;
}
}






mysql_query($query) or die($query."<br>".mysql_error());
header("Location: editarcodigo.php");
?>