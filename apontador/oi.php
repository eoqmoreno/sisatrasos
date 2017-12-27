<?php 
$conecta = mysql_connect("localhost", "root", "") or print (mysql_error()); 
mysql_select_db("sistemaatraso", $conecta) or print(mysql_error()); 
print "Conexão e Seleção OK!"; 

?>


<?php 
if(count($_POST) < 0){

$nome = $_POST["nome"];
$imagem = $_FILES["foto"];
$serie = $_POST["serio"];
$curso = $_POST["curso"];
$telefone = $_POST["telefone"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$query = "INSERT INTO `noticias` (`titulo`, `texto`, `cadastro`) VALUES ('".$titulo."', '".$texto."', '".$cadastro."')";
// Executa a query
$inserir = mysql_query($query);

/*
$nomeFinal = time().'.jpg';
move_uploaded_file($imagem['tmp_name'], "images/".$nomeFinal);
$tamanhoImg = filesize("images/".$nomeFinal); 
$mysqlImg = addslashes(fread(fopen("images/".$nomeFinal, "r"), $tamanhoImg)); 
$sql = "INSERT INTO profdt VALUES ";
$sql .= "('oi', 'oi', 'oi')";
}
*/
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
	
	<label>Nome:</label> <input type="text" name="nome" class="levar">
	<br><br>
	<label>Foto:</label> <input type="file" name="foto" class="levar" >
	<br><br>
	<label>Série:</label>   
								
								1°</a><input type="radio" name="serio">
								2°<input type="radio" name="serio">
								3°<input type="radio" name="serio">
								
							<br><br>

	<label>Curso:</label> 
								<select class="levar" name="curso">
									<option>Informática</option>
									<option>Enfermagem</option>
									<option>Segurança do Trabalho</option>
									<option>Libras</option>
									<option>Hospedagem</option>
									</select>
	
	<br>
	<br>
	<label>Telefone:</label> <input type="text" name="telefone" class="levar">
	<br>
	<br>
	<label>Usuário:</label> <input type="text" name="usuario" class="levar">
	<br>
	<br>
	<label>Senha:</label> <input type="password" name="senha" class="levar">

	<br><br>
	<input type="submit" name="" class="botao">
	<input type="reset" name="" class="botao">
</form>

</div>

<?php include "creditos.php" ?>
</body>
</html>