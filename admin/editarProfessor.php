<?php 
include '../conexao.php';
include '../header.php';

$id = $_REQUEST["id"];

$query = "SELECT * FROM professor WHERE id=$id";

$dados = mysqli_query($conexao,$query);
$resultados = mysqli_fetch_object($dados);
$alterar_nome = $resultados->nome;
$alterar_serie = $resultados->serie;
$alterar_curso = $resultados->curso;
$alterar_telefone = $resultados->telefone;
?>

<a title="voltar" class="bg-laranja preto pointer text-bold m-0 p-2 pt-2 voltar" onclick="voltar()"><span class="fa fa-arrow-circle-o-left" aria-hidden="true"></span> Voltar</a> 

<div class="container col-md-4 border-laranja border-radius text-center">
<form method="post" action="editProfessor.php" class="form" enctype="multipart/form-data">
<label class="text-quarenta helveticalg">Editar Aluno</label>
<input type="hidden" name="id" value="<?php echo $id;?>">
<div class="form-inline"><label>Nome:</label><input type="text" name="nome" class="form-control" required value="<?php echo $alterar_nome; ?>"></div>
<div class="form-inline"><label>Foto:</label> <input type="file" name="image" required class="form-control-file" ></div>
<div class="form-inline">
<?php 
switch ($alterar_serie) {
case 1:
	echo "
		<label>Série:</label>   
		<input required type='radio' name='serie' value='1' checked>1° Ano
		<input required type='radio' name='serie' value='2'>2° Ano
		<input type='radio' name='serie' value='3'>3° Ano
	";
break;
case 2:
	echo "
		<label>Série:</label>   
		<input required type='radio' name='serie' value='1'>1° Ano
		<input required type='radio' name='serie' value='2' checked>2° Ano
		<input required type='radio' name='serie' value='3'>3° Ano
	";
break;
case 3:
	echo "
		<label>Série:</label>   
		<input required type='radio' name='serie' value='1'>1° Ano
		<input required type='radio' name='serie' value='2'>2° Ano
		<input required type='radio' name='serie' value='3' checked>3° Ano
	";
break;
default:
# code...
break;
}
?>
</div>
<div class="form-inline">
	<label>Curso:</label> 
<?php 
switch ($alterar_curso) {
case "Informática":
	echo "
		<select class='form-control' name='curso' required>
		<option selected>Informatica</option>
		<option>Enfermagem</option>
		<option>Segurança do Trabalho</option>
		<option>Libras</option>
		<option>Hospedagem</option>
		</select>
	";
break;
case "Enfermagem":
	echo "
		<select class='form-control' name='curso' required>
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
		<select class='form-control' name='curso' required>
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
		<select class='form-control' name='curso' required>
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
		<select class='form-control' name='curso' required>
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
</div>
<div class="form-inline"><label>Telefone:</label> <input type="text" required name="telAluno" class="form-control telefone" id="telefone" value="<?php echo $alterar_telefone; ?>"></div>
<input type="submit" name="" class="btn mt-1 text-bold laranja border-laranja bg-branco procurar pointer">
<input type="reset" name="" class="btn mt-1 text-bold laranja border-laranja bg-branco procurar pointer">
</form>
</div>
</body>
</html>