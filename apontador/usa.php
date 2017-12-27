<?php 
include 'conexao.php';

?>


<?php 
$id = $_REQUEST["id"];

$query = "SELECT * FROM detes WHERE id=".$id;
$dados = mysql_query($query);
$resultados = mysql_fetch_object($dados);
$alterar_nome = $resultados->nome;
$alterar_imagem = $resultados->imagem;
$alterar_serie = $resultados->serie;
$alterar_curso = $resultados->curso;
$alterar_telefone = $resultados->telefone;
$alterar_usuario = $resultados->usuario;
$alterar_senha = $resultados->senha;
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

	<h1> EDITAR PRFOSSOR DT </h1>

<form method="post" action="alterar_gravar.php" class="add" enctype="multipart/form-data">
	
	<label>Nome:</label> <input type="text" name="nome" class="levar" required="" value="<?php if($alterar_nome != null) {
		echo $alterar_nome;
	}
		else {
			echo "";
		}
	?>">
	<br><br>
	<label>Foto:</label> <input type="file" name="foto" class="levar">
	<br><br>
	<label>Série:</label>   
								
								1°</a><input type="radio" name="serie" value="1">
								2°<input type="radio" name="serie" value="2">
								3°<input type="radio" name="serie" value="3" checked>
								
							<br><br>

	<label>Curso:</label> 
								<select class="levar" name="curso" required="">
									<option>Informática</option>
									<option>Enfermagem</option>
									<option>Segurança do Trabalho</option>
									<option>Libras</option>
									<option>Hospedagem</option>
									</select>
	
	<br>
	<br>
	<label>Telefone:</label> <input type="text" name="telefone" id="telefone" class="levar" required="" value="<?php if($alterar_telefone != null) {
		echo $alterar_telefone;
	}
		else {
			echo "";
		}
	?>">
	<br>
	<br>
	<label>Usuário:</label> <input type="text" name="usuario" class="levar" required="" value="<?php if($alterar_usuario != null) {
		echo $alterar_usuario;
	}
		else {
			echo "";
		}
	?>">
	<br>
	<br>
	<label>Senha:</label> <input type="password" name="senha" class="levar" required="" value="<?php if($alterar_senha != null) {
		echo $alterar_senha;
	}
		else {
			echo "";
		}
	?>">

	<br><br>
	<input type="submit" name="" class="botao" value="Alterar">
	<input type="reset" name="" class="botao">
</form>

</div>

<?php include "creditos.php" ?>
</body>
</html>