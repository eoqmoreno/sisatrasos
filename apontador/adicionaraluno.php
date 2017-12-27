<script>
		 jQuery(function($){
			  $('#telefone').mask('(00) 00000-0000');
			  $('#telefone2').mask('(00) 00000-0000');
			  $('#cpf').mask('000.000.000-00');
			  $('#rg').mask('99.999.999-9');
		});
	</script>
<?php include "../header.php" ?>
<div class="back"><h5><a href="index.php">Voltar</a></h5></div>
<div class="nosso">

	<h1> ADICIONAR ALUNO </h1>

<form method="post" action="pegarInfo.php" class="add" enctype="multipart/form-data">
	
	<label>Nome:</label> <input type="text" name="nome" class="levar">
	<br><BR>
	<label>Numero SIGE:</label> <input type="text" name="numeroSige" class="levar">
	<br><br>
	<label>Foto:</label> <input type="file" name="foto" class="levar" >
	<br><br>
	<label>Série:</label>   
								
								1°<input type="radio" name="serie" value="1">
								2°<input type="radio" name="serie" value="2">
								3°<input type="radio" name="serie" value="3" checked="">
								
							<br><br>

	<label>Curso:</label> 
								<select class="levar" name="curso">
									<option>Informatica</option>
									<option>Enfermagem</option>
									<option>Segurança do Trabalho</option>
									<option>Libras</option>
									<option>Hospedagem</option>
									</select>
							

	<br><br>
	<label>RG:</label> <input type="text" name="rg" class="levar" id="rg">
	<br><br>
	<label>CPF:</label> <input type="text" maxlength="14" name="cpf" class="levar" id="cpf">
	<br><br>
	<label>Tel. Aluno:</label> <input type="text" maxlength="20" name="telAluno" class="levar" id="telefone">
	<br><br>
	<label>Tel. Resp:</label> <input type="text" name="telResponsavel" class="levar" id="telefone2">
	<br><br>
	<label>Email:</label> <input type="email" name="email" class="levar">
	<br><br>
	<input type="submit" name="" class="botao">
	<input type="reset" name="" class="botao">
</form>

</div>
</body>
</html>