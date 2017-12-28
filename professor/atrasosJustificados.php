<table class="table table-responsive">

<thead>
<tr>
    <th >ALUNO</th>
    <th>SIGE</th>
    <th>HORA</th> 
    <th>DATA</th>
    <th>JUSTIFICATIVA</th>
  </tr>

</tr>
</thead>
<tbody>
<tr>

<?php 

include '../conexao.php';
$serie = $_COOKIE['serieDT'];
$curso = $_COOKIE['cursoDT'];
?>

 <h5><?php echo $curso. " ";?><?php echo $serie. " ";?></h5>

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
</table>
