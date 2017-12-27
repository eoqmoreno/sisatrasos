<?php 
include '../conexao.php';
$serie = $_GET['serio'];
$curso = $_GET['curso'];

setcookie("serie", $serie);
setcookie("curso", $curso);

?>

    <script type="text/javascript" src="jquery-2.2.4.js"></script> <script type="text/javascript" src="jquery.mask.min.js"></script>
    <script src="buscaAluno.js"></script>

	 <script>
		 jQuery(function($){
			  $('#horario').mask('00h00m');
		});
	</script>

<?php include "../header.php" ?>

<div class="back"><h5><a href="novoatraso.php">Voltar</a></h5></div>
<div class="sasuke">



	<h1> ALUNOS </h1>

    <form>

<label>BUSCAR</label><input type="text" class="levar" name="procura" id="buscar">

    
</form>


<div id="alunos">
<table class="table">
<thead>
<tr>
    <th>NOME</th>
    <th>FOTO</th> 
    <th>SERIE</th>
    <th>CURSO</th>
    <th>CPF</th> 
    <th>RG</th>
    <th>TELEFONE ALUNO</th>
    <th>TELEFONE RES.</th>
    <th>EMAIL</th>
    <th>QTD Atrasos</th>
    <th>NUMERO SIGE</th>
</tr>
</thead>
<tbody>
   <tr>

<?php 

$query = "SELECT * FROM alunos WHERE curso='$curso' AND serie='$serie' ORDER BY nome";

$dados = mysqli_query($conexao,$query); 

while($row=mysqli_fetch_array($dados)) 
{

$url_alterar = "addInfoAtraso.php?id=".$row["id"];
$url_apagar = "apagarAluno.php?id=".$row["id"];
$url_ver = "verAtrasos.php?id=".$row["id"];
$url_editar = "editarAluno.php?id=".$row["id"];

echo '<tr><td>'.$row["nome"] . '</td>';
echo  '<td><img src="'.$row['foto'].'" height="69" width="69"/>'. '</td>';
echo '<td>'.$row["serie"].'</td>';
echo '<td>'.$row["curso"] . '</td>';
echo '<td>'.$row["rg"] . '</td>';
echo '<td>'.$row["cpf"] . '</td>';
echo '<td>'.$row["telaluno"] . '</td>';
echo '<td>'.$row["telresponsavel"] . '</td>';
echo '<td>'.$row["email"] . '</td>';
echo '<td>'.$row["qtdAtraso"] . '</td>';
echo '<td>'.$row["numeroSige"] . '</td><td><a href="'.$url_ver.'">VER ATRASOS</a></td><td><a href="'.$url_alterar.'">ADICIONAR ATRASO</a></td><td><a href="'.$url_apagar.'">EXCLUIR</a></td><td><a href="'.$url_editar.'">EDITAR</a></td></tr>';
}




?>
</tbody>
</table></div>

<!--

<form action="excluirTurma.php"  method="post">

<input type="submit" name="excluir" class="botao" value="Apagar Turmar">

</div>
-->
</body>
</html>