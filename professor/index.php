<?php
session_start(); 

include '../conexao.php';
$usuario = $_SESSION['usu'];
$senha = $_SESSION['sen'];
$sql = mysqli_query($conexao,"SELECT * FROM professor WHERE usuario = '$usuario' AND senha = '$senha'");
$row=mysqli_fetch_array($sql);
$nome = $row['nome'];
$curso = $row['curso'];
$img = $row['imagem'];
$serie = $row['serie'];
$tipo = "asd";

setcookie("cursoDT", $curso);
setcookie("serieDT", $serie);

if(!isset($_SESSION['usu']) and !isset($_SESSION['sen'])) {
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<?php
include '../header.php';
?>
<head>
	<title>Página Professor DT</title>
</head>
<body>

<ul class="list-inline text-center bg-cinza pt-1 pb-1">			 
            <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#paraHoje" aria-expanded="false" aria-controls="collapseExample">Reuniões para hoje</a></li>
	  	    <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#reuniao" aria-expanded="false" aria-controls="collapseExample">Reuniões Marcadas</a></li>
	    	<li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#minhaTurma" aria-expanded="false" aria-controls="collapseExample">Minha Turma</a></li>
	    	<li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#atrasosJustificados" aria-expanded="false" aria-controls="collapseExample">Atrasos Justificados</a></li>
            <li class="list-inline-item"><a class="laranja" href="sair.php">Sair</a></li>
</ul>
<!-- REUNIÕES PARA HOJE -->
<div class="collapse" id="paraHoje">
            <div class="container col-md-6 border-laranja border-radius text-center table-responsive">
            <label class="text-quarenta helveticalg">Reuniões Para Hoje</label>
				<table class="table">

				<thead>
				<tr>
					<th class="text-center">ALUNO</th>
					<th class="text-center">DATA</th>
					<th class="text-center">HORARIO</th> 
					<th class="text-center">TELEFONE RES.</th>
				</tr>
				</thead>
				<tbody>
				<tr>

				<?php 
				$today = date("Y-m-d");  
				$query = "SELECT * FROM reuniao WHERE curso='$curso' AND serie='$serie' AND data='$today'";
				$dados = mysqli_query($conexao,$query); 

				while($row=mysqli_fetch_array($dados)) 
				{

				$url_apagar = "apagarAtraso.php?id=".$row["id"];

				$sige = $row['numeroSige'];
				$query1 = "SELECT * FROM alunos WHERE numeroSige=$sige";
				$sql = mysqli_query($conexao,$query1)or die(mysqli_error($conexao));
				$row1 = mysqli_fetch_array($sql);
				echo '<tr><td>'.$row1["nome"].'</td>';
				echo '<td>'.$row["data"] . '</td>';
				echo '<td>'.$row["hora"] . '</td>';
				echo '<td>'.$row1["telresponsavel"]. '</td><td><a href="'.$url_apagar.'">EXCLUIR</a></td></tr>';
				}
				?>
				</tbody></table> 
        	</div>
</div>

<!-- REUNIÕES MARCADAS-->
<div class="collapse" id="reuniao">
            <div class="container col-md-6 border-laranja border-radius text-center table-responsive">
			<label class="text-quarenta helveticalg">Reuniões Marcadas</label>
			
<table class="table">

<thead>
<tr>
	<th class="text-center">ALUNO</th>
	<th class="text-center">DATA</th>
	<th class="text-center">HORARIO</th> 
	<th class="text-center">TELEFONE RES.</th>
</tr>
</thead>
<tbody>
<tr>

<?php 
$query = "SELECT * FROM reuniao WHERE curso='$curso' AND serie='$serie'";
$dados = mysqli_query($conexao,$query); 

while($row=mysqli_fetch_array($dados)) 
{

$url_apagar = "apagarAtraso.php?id=".$row["id"];

$sige = $row['numeroSige'];
$query1 = "SELECT * FROM alunos WHERE numeroSige=".$sige;
$dados1 = mysqli_query($conexao,$query1); 
$row1=mysqli_fetch_array($dados1);


echo '<tr><td class="text-center">'.$row1["nome"] . '</td>';
echo '<td class="text-center">'.$row["data"] . '</td>';
echo '<td class="text-center">'.$row["hora"] . '</td>';
echo '<td class="text-center">'.$row1["telresponsavel"]. '</td><td class="text-center"><a href="'.$url_apagar.'">EXCLUIR</a></td></tr>';

}
?>
</table>
</div>
</div>

<!-- MINHA TURMA -->
<div class="collapse" id="minhaTurma">
            <div class="container col-md-10 border-laranja border-radius text-center table-responsive">
            <label class="text-quarenta helveticalg">Minha Turma</label>
				
				<div id="alunos">

				<h5><?php echo $serie ."º ". $curso;?></h5>
				<table class="table">
				<thead>
				<tr>
					<th class="text-center" scope="col">NOME</th>
					<th class="text-center" scope="col">FOTO</th> 
					<th class="text-center" scope="col">TEL. ALUNO</th>
					<th class="text-center" scope="col">TEL. RESPONSAVEL</th>
					<th class="text-center" scope="col">EMAIL</th>
					<th class="text-center" scope="col">QTD Atrasos</th>
					<th class="text-center" scope="col">NUMERO SIGE</th>
				</tr>
				</thead>
				<tbody>
				<tr>

				<?php 
				$query = "SELECT * FROM alunos WHERE curso='$curso' AND serie='$serie' ORDER BY nome";
				$dados = mysqli_query($conexao,$query); 
				while($row=mysqli_fetch_array($dados)) 
				{
				$url_editar = "editarAluno.php?id=".$row["id"];
				echo '<tr scope="row"><td>'.$row["nome"] . '</td>';
				echo  '<td>'.'<img src="'.$row['foto'].'" height="40" width="40"/>'. '</td>';
				echo '<td>'.$row["telaluno"] . '</td>';
				echo '<td>'.$row["telresponsavel"] . '</td>';
				echo '<td>'.$row["email"] . '</td>';
				echo '<td>'.$row["qtdAtraso"] . '</td>';
				echo '<td>'.$row["numeroSige"].'</td><td><a href="'.$url_editar.'">EDITAR</a></td></tr>';
				}
				?>
				</tr>
				</tbody>
				</table></div>
        	</div>
</div>

<!-- ATRASOS JUSTIFICADOS -->
<div class="collapse" id="atrasosJustificados">
            <div class="container col-md-6 border-laranja border-radius text-center table-responsive">
            <label class="text-quarenta helveticalg">Atrasos Justificados</label>
			<center>
			<table class="table">
				<thead>
				<tr>
					<th class="text-center">ALUNO</th>
					<th class="text-center">SIGE</th>
					<th class="text-center">HORA</th> 
					<th class="text-center">DATA</th>
					<th class="text-center">JUSTIFICATIVA</th>
				</tr>

				</tr>
				</thead>
				<tbody>
				<tr>
				<?php
				$query = "SELECT * FROM atraso WHERE curso='$curso' AND serie='$serie' AND motivo<>'Falta nao justificada'";
				$dados = mysqli_query($conexao,$query); 
				while($row=mysqli_fetch_array($dados)) 
				{

				$url_apagar = "apagarAtrasoJustificado.php?id=".$row["id"];

				$sige = $row['numeroSige'];
				$query1 = "SELECT * FROM alunos WHERE numeroSige=".$sige;
				$sql = mysqli_query($conexao,$query1)or die(mysqli_error($conexao));
				$row1 = mysqli_fetch_array($sql);


				echo '<tr><td class="text-center">'.$row1["nome"] . '</td>';
				echo '<td class="text-center">'.$row["numeroSige"] . '</td>';
				echo '<td class="text-center">'.$row["horario"] . '</td>';
				echo '<td class="text-center">'.$row["data"] . '</td>';
				echo '<td class="text-center">'.$row["motivo"]. '</td><td class="text-center"><a href="'.$url_apagar.'">EXCLUIR</a></td></tr>';
				}
				?>
				</table></center>

        	</div>
</div>


</body>
</html>