<?php 
include 'conexao.php';

?>



<link rel="stylesheet" type="text/css" href="aa.css">
	<script type="text/javascript" src="jquery-2.2.4.js"></script> <script type="text/javascript" src="jquery.mask.min.js"></script>
	 <script>
		 jQuery(function($){
			  $('#telefone').mask('(00) 00000-0000');
		});
	</script>



<?php 
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




  $res   = mysql_query($query, $conexao);

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
<style>
	body {
		height: auto !important;
		font-size: 20px;
		font-family: 'Bitter', serif;
		color: #fff;
	}

</style>


<?php include "header.php" ?>
<div class="back"><h5><a href="index.php">Voltar</a></h5></div>
<div class="nossoo">

	<h1> ADICIONAR PRFOSSOR DT </h1>

<form method="post" action="adicionardt.php" class="add" enctype="multipart/form-data">
	
	<label>Nome:</label> <input type="text" name="nome" class="levar" required="">
	<br><br>
	<label>Foto:</label> <input type="file" name="foto" class="levar" >
	<br><br>
	<label>Série:</label>   
								
								1°</a><input type="radio" name="serie" value="1">
								2°<input type="radio" name="serie" value="2">
								3°<input type="radio" name="serie" value="3" checked>
								
							<br><br>

	<label>Curso:</label> 
								<select class="levar" name="curso" required="">
									<option>Informatica</option>
									<option>Enfermagem</option>
									<option>Segurança do Trabalho</option>
									<option>Libras</option>
									<option>Hospedagem</option>
									</select>
	
	<br>
	<br>
	<label>Telefone:</label> <input type="text" name="telefone" id="telefone" class="levar" required="">
	<br>
	<br>
	<label>Usuário:</label> <input type="text" name="usuario" class="levar" required="">
	<br>
	<br>
	<label>Senha:</label> <input type="password" name="senha" class="levar" required="">

	<br><br>
	<input type="submit" name="" class="botao">
	<input type="reset" name="" class="botao">
</form>

</div>

<?php include "creditos.php" ?>
</body>
</html>