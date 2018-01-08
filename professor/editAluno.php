<?php 
include '../conexao.php';

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
$nomeResponsavel = $_REQUEST['nomeResponsavel'];

$imagem = $_FILES['image']['tmp_name'];
$local = '../fotos/aluno/'.$numeroSige.'.png';

if(file_exists($local)) {
	unlink($local);
	copy($imagem,$local);
}else{
	copy($imagem,$local);
}

if(isset($local)) {
$query = "UPDATE alunos SET nome='".$nome."',foto='".$local."',curso='".$curso."',serie='".$serie."' ,rg='".$rg."',cpf='".$cpf."',telaluno='".$telAluno."',nomeResponsavel='".$nomeResponsavel."' ,telresponsavel='".$telResp."',email='".$email."',numeroSige='".$numeroSige."' WHERE id=".$id;
}
else {
$query = "UPDATE alunos SET nome='".$nome."',curso='".$curso."',serie='".$serie."' ,rg='".$rg."',cpf='".$cpf."',telaluno='".$telAluno."',nomeResponsavel='".$nomeResponsavel."' ,telresponsavel='".$telResp."' ,email='".$email."',numeroSige='".$numeroSige."' WHERE id=".$id;
}
mysqli_query($conexao,$query) or die(mysqli_error($conexao));
header("location: index.php");
?>