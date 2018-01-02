<style>
	body {
		height: auto !important;
		font-size: 20px;
		font-family: 'Bitter', serif;
		color: #fff;
	}

.detes td {
    text-align: -webkit-center;
    background: #855677;
    padding: 0;
}
table.detes {
    margin: 0 auto;
}

</style>

<table class="detes">

<tr>
    <th>NOME</th>
    <th>FOTO</th> 
    <th>SERIE</th>
    <th>CURSO</th>
    <th>TELEFONE</th> 
    <th>USUARIO</th>

  </tr>

   <tr>

<?php 
include 'conexao.php';
include "header.php";
$busca = "%{$_POST['procura']}%";

$curso = $_COOKIE["curso"];
$serie = $_COOKIE["serie"];





$sql=$conexao2->prepare("SELECT * FROM alunos WHERE nome LIKE ? AND serie = '$serie' AND curso = '$curso' ORDER BY nome" );
$sql->bind_param('s',$busca);
$sql->execute();
$sql->bind_result($nome,$foto,$serie,$curso,$rg,$cpf,$telaluno,$telresponsavel,$email,$numeroSige,$qtdAtraso,$id);



while($sql->fetch()) 
{


$url_alterar = "addInfoAtraso.php?id=".$id;
$url_apagar = "apagarAluno.php?id=".$id;
$url_ver = "verAtrasos.php?id=".$id;
$url_editar = "editarAluno.php?id=".$id;

echo '<tr><td>'.$nome. '</td>';
echo  '<td>'.'<img src="data:image/jpeg;base64,'.base64_encode($foto).'" height="69" width="69"/>'. '</td>';
echo '<td>'.$serie. '</td>';
echo '<td>'.$curso. '</td>';
echo '<td>'.$rg. '</td>';
echo '<td>'.$cpf. '</td>';
echo '<td>'.$telaluno. '</td>';
echo '<td>'.$telresponsavel. '</td>';
echo '<td>'.$email. '</td>';
echo '<td>'.$qtdAtraso. '</td>';
echo '<td>'.$numeroSige. '</td><td><a href="'.$url_ver.'">VER ATRASOS</a></td><td><a href="'.$url_alterar.'">ADICIONAR ATRASO</a></td><td><a href="'.$url_apagar.'">EXCLUIR</a></td><td><a href="'.$url_editar.'">EDITAR</a></td></tr>';
}


?>
</table>