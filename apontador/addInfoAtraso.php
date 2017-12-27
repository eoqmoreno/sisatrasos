<style>
	body {
		height: auto !important;
		font-size: 20px;
		font-family: 'Bitter', serif;
		color: #fff;
	}

</style>

	<script type="text/javascript" src="jquery-2.2.4.js"></script> <script type="text/javascript" src="jquery.mask.min.js"></script>
 <script>

 $(document).ready(function() {
                $("#motivo").hide();
                });


 function isa() {
		 $(document).ready(function() {
                $("#motivo").toggle('slow, 1000');

                });

		 document.getElementById("oi").required = true;
		}
 

	</script>

<script type="text/javascript">
	
		alert("Olá");
	}
</script>


<?php
include '../conexao.php';
$id = $_REQUEST["id"];

$query = "SELECT * FROM alunos WHERE id=".$id;
$dados = mysqli_query($conexao,$query);
$resultados = mysqli_fetch_object($dados);
$sige = $resultados->numeroSige;
$quantidadeAtrasos = $resultados->qtdAtraso;


?>

<script type="text/javascript" src="jquery-2.2.4.js"></script> <script type="text/javascript" src="jquery.mask.min.js"></script>


<?php include "../header.php" ?>

<div class="back"><h5><a href="novoatraso.php">Voltar</a></h5></div>
<div class="sasuke">

	<h1> ADICIONAR ATRASO </h1>

<form method="post" action="addFinal.php?numeroSige=<?php echo $sige;?>">
	<label>Data:</label><input type="date" name="data" class="levar" required="">
	<br><br>
	<label>Horário:</label><input type="time" id="horario" name="hra" class="levar" required="">
	<br><br>
	Justificada <input type="checkbox" value="justificado" onclick="isa();">
	<br><br>
	<div id="motivo">
	Motivo: <input type="type" name="motivo" id="oi" class="levar">
	</div>
	<br><br>
	<input type="submit" name="" class="botao">
	<input type="reset" class="botao">
</form>
</div>


</body>
</html>