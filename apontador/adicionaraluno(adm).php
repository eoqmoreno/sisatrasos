<style>
	body {
		height: auto !important;
		font-size: 20px;
		font-family: 'Bitter', serif;
		color: #fff;
	}

</style>


<?php include "header.php" ?>
<div class="back"><h5><a href="adm1.php">Voltar</a></h5></div>
<div class="nosso">

	<h1> ADICIONAR ALUNO </h1>

<form method="post" action="pegarInfo.php" class="add">
	
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
								<select class="levar">
									<option>Informática</option>
									<option>Enfermagem</option>
									<option>Segurança do Trabalho</option>
									<option>Libras</option>
									<option>Hospedagem</option>
									</select>
							

	<br><br>
	<label>RG:</label> <input type="text" name="foto" class="levar">
	<br><br>
	<label>CPF:</label> <input type="text" maxlength="14" name="foto" class="levar" >
	<br><br>
	<label>Tel. Aluno:</label> <input type="text" maxlength="20" name="foto" class="levar" >
	<br><br>
	<label>Tel. Resp:</label> <input type="text" name="foto" class="levar">
	<br><br>
	<label>Email:</label> <input type="email" name="foto" class="levar">
	<br><br>
	<input type="submit" name="" class="botao">
	<input type="reset" name="" class="botao">
</form>

</div>

<?php include "creditos.php" ?>
</body>
</html>