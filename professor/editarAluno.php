<?php 
include '../conexao.php';
include '../header.php';

?>
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

$query = "SELECT * FROM alunos WHERE id=".$id;

$dados = mysqli_query($conexao,$query);
$resultados = mysqli_fetch_object($dados);
$alterar_nome = $resultados->nome;
$alterar_serie = $resultados->serie;
$alterar_curso = $resultados->curso;
$alterar_rg = $resultados->rg;
$alterar_cpf = $resultados->cpf;
$alterar_telaluno = $resultados->telaluno;
$alterar_telResp = $resultados->telresponsavel;
$alterar_email = $resultados->email;
$alterar_numeroSige = $resultados->numeroSige;



?>
<a class="sair" href="JavaScript: window.history.back();">Voltar</a> 

<div class="nossoo">

<h1> EDITAR ALUNO </h1>

<form method="post" action="editarAlunosInfo.php" class="add" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id;?>">
	
	<label>Nome:</label> <input type="text" name="nome" class="levar" value="<?php echo $alterar_nome; ?>">
	<br><BR>
	<label>Numero SIGE:</label> <input type="text" name="numeroSige" class="levar" value="<?php echo $alterar_numeroSige; ?>">
	<br><br>
	<label>Foto:</label> <input type="file" name="image" class="levar" >
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

							

	<br><br>
	<label>RG:</label> <input type="text" name="rg" class="levar" id="rg" value="<?php echo $alterar_rg; ?>">
	<br><br>
	<label>CPF:</label> <input type="text" maxlength="14" name="cpf" class="levar" id="cpf" value="<?php echo $alterar_cpf; ?>">
	<br><br>
	<label>Tel. Aluno:</label> <input type="text" maxlength="20" name="telAluno" class="levar" id="telefone" value="<?php echo $alterar_telaluno; ?>">
	<br><br>
	<label>Tel. Resp:</label> <input type="text" name="telResponsavel" class="levar" id="telefone2" value="<?php echo $alterar_telResp; ?>">
	<br><br>
	<label>Email:</label> <input type="email" name="email" class="levar" value="<?php echo $alterar_email; ?>">
	<br><br>
	<input type="submit" name="" class="botao">
	<input type="reset" name="" class="botao">
</form>

</div>

</body>
</html>