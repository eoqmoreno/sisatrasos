<?php 
include '../conexao.php';

?>


<style>
	body {
		height: auto !important;
		font-size: 20px;
		font-family: 'Bitter', serif;
		color: #fff;
	}

</style>



<?php include "../header.php" ?>
<div class="back"><h5><a href="index.php">Voltar</a></h5></div>
<div class="nossopaodecadadia">

	<h1> TURMA </h1>

<form method="get" action="gerar_relatorio.php" class="add">
	
	<label>Série:</label>   
								
								1°</a><input type="radio" name="serio" required="" value="1">
								2°<input type="radio" name="serio" required="" value="2">
								3°<input type="radio" name="serio" required="" value="3" checked="">
								
							<br><br>

	<label>Curso:</label> 
								<select name="curso" class="levar" required="">
									<option>Informatica</option>
									<option>Enfermagem</option>
									<option>Segurança do Trabalho</option>
									<option>Libras</option>
									<option>Hospedagem</option>
									</select>
							
<br><br>


	<center><input type="submit" name="" value="Gerar]" class="botao">
	<input type="reset" name="" class="botao"> </center>

</form>


</div>
</body>
</html>