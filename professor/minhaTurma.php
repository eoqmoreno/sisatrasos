<?php 
session_start(); 
include '../conexao.php';
include '../header.php';

$serie = $_COOKIE['serieDT'];
$curso = $_COOKIE['cursoDT'];
?>

<div id="alunos">

<h1><?php echo $serie ."º ". $curso;?></h1>
<table class="table table-responsive">
<thead>
<tr class="text-center">
    <th scope="col">NOME</th>
    <th scope="col">FOTO</th> 
    <th scope="col">TEL. ALUNO</th>
    <th scope="col">TEL. RESPONSAVEL</th>
    <th scope="col">EMAIL</th>
    <th scope="col">QTD Atrasos</th>
    <th scope="col">NUMERO SIGE</th>
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