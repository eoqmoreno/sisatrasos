<?php 
include '../conexao.php';

?>

	<script type="text/javascript" src="jquery-2.2.4.js"></script> <script type="text/javascript" src="jquery.mask.min.js"></script>
 <script>
		 jQuery(function($){
			  $('#telefone').mask('(00) 00000-0000');
			  $('#telefone2').mask('(00) 00000-0000');
			  $('#cpf').mask('000.000.000-00');
			  $('#rg').mask('99.999.999-9');
		});
	</script>
<?php 
$id = $_REQUEST["id"];
$nome = $_REQUEST["nome"];
$numeroSige = $_REQUEST["numeroSige"];
$serie = $_REQUEST["serie"];
$curso = $_REQUEST["curso"];
$rg = $_REQUEST["rg"];
$cpf = $_REQUEST["cpf"];
$telAluno = $_REQUEST['telAluno']; 
$telResp = $_REQUEST['telResponsavel'];
$email =  $_REQUEST['email'];


$imagem = $_FILES["image"];

if($imagem != NULL) {

	$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal); 
		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));


}

if(isset($mysqlImg)) {
$query = "UPDATE alunos SET nome='".$nome."',foto='".$mysqlImg."',curso='".$curso."',serie='".$serie."' ,rg='".$rg."',cpf='".$cpf."',telaluno='".$telAluno."' ,telresponsavel='".$telResponsavel."',email='".$email."',numeroSige='".$numeroSige."' WHERE id=".$id;
}
else {
$query = "UPDATE alunos SET nome='".$nome."',curso='".$curso."',serie='".$serie."' ,rg='".$rg."',cpf='".$cpf."',telaluno='".$telAluno."' ,telresponsavel='".$telResp."' ,email='".$email."',numeroSige='".$numeroSige."' WHERE id=".$id;
}
}






mysqli_query($conexao,$query) or die(mysqli_error($conexao));
 echo "window.location = procuraraluno.php?serio='.$serie.'&curso='.$curso.";
?>