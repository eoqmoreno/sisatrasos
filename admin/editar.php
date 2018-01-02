<?php 
include '../conexao.php';

$id = $_REQUEST["id"];

$query = "SELECT * FROM professor WHERE id=".$id;

$dados = mysqli_query($conexao,$query)or die(mysqli_error($conexao));
$resultados = mysqli_fetch_array($dados);
$alterar_nome = $resultados['nome'];
$alterar_serie = $resultados['serie'];
$alterar_curso = $resultados['curso'];
$alterar_telefone = $resultados['telefone'];
$alterar_usuario = $resultados['usuario'];
$alterar_senha = $resultados['senha'];

?>


<?php include "../header.php" ?>
<div class="back"><h5><a href="index.php">Voltar</a></h5></div>
<div class="nossoo">


	<h1> EDITAR PRFOSSOR DT </h1>

<form method="post" action="alterar_gravar.php" class="add" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id;?>">
	
	<label>Nome:</label> <input type="text" name="nome" class="levar" required="" value="<?php if($alterar_nome != null) {
		echo $alterar_nome;
	}
		else {
			echo "";
		}
	?>">
	<br><br>

	<?php 
	switch ($alterar_serie) {
		case 1:
			echo "

<label>Série:</label>   
								
								1°</a><input type='radio' name='serie' value='1' checked>
								2°<input type='radio' name='serie' value='2'>
								3°<input type='radio' name='serie' value='3'>

		";
			break;

					case 2:
			echo "

<label>Série:</label>   
								
								1°</a><input type='radio' name='serie' value='1' >
								2°<input type='radio' name='serie' value='2' checked>
								3°<input type='radio' name='serie' value='3'>

		";
			break;


					case 3:
			echo "

<label>Série:</label>   
								
								1°</a><input type='radio' name='serie' value='1'>
								2°<input type='radio' name='serie' value='2'>
								3°<input type='radio' name='serie' value='3' checked>

		";
			break;
		
		default:
			# code...
			break;
	}

	?>
	
								
							<br><br>
<p>Não esqueça de selecionar sua série</p>
	<label>Foto:</label> <input type="file" name="foto" class="levar" >
	<br><br>
	<label>Curso:</label> 



		<?php 
	switch ($alterar_curso) {
		case "Informatica":
			echo "

<select class='levar' name='curso' required=''>
									<option selected='selected'>Informatica</option>
									<option>Enfermagem</option>
									<option>Segurança do Trabalho</option>
									<option>Libras</option>
									<option>Hospedagem</option>
									</select>
	

		";
			break;

				case "Enfermagem":
			echo "

<select class='levar' name='curso' required=''>
									<option>Informatica</option>
									<option selected>Enfermagem</option>
									<option>Segurança do Trabalho</option>
									<option>Libras</option>
									<option>Hospedagem</option>
									</select>
	

		";
			break;


				case "Segurança do Trabalho":
			echo "

<select class='levar' name='curso' required''>
									<option>Informatica</option>
									<option>Enfermagem</option>
									<option selected>Segurança do Trabalho</option>
									<option>Libras</option>
									<option>Hospedagem</option>
									</select>
	

		";
			break;

							case "Libras":
			echo "

<select class='levar' name='curso' required=''>
									<option>Informatica</option>
									<option>Enfermagem</option>
									<option>Segurança do Trabalho</option>
									<option selected>Libras</option>
									<option>Hospedagem</option>
									</select>
	

		";
			break;


case "Hospedagem":
			echo "

<select class='levar' name='curso' required=''>
									<option>Informatica</option>
									<option>Enfermagem</option>
									<option>Segurança do Trabalho</option>
									<option>Libras</option>
									<option selected>Hospedagem</option>
									</select>
	

		";
			break;
		
		default:
			# code...
			break;
	}

	?>

	
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
	<input type="submit" name="" class="botao">
	<input type="reset" name="" class="botao">
</form>

</div>
</body>
</html>