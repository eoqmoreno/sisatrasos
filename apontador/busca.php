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
$busca = "%{$_POST['buscarat']}%";


$sql=$conexao2->prepare('SELECT * FROM detes WHERE nome LIKE ?');
$sql->bind_param('s',$busca);
$sql->execute();
$sql->bind_result($id,$nome,$imagem,$serie,$curso,$telefone,$usuario,$senha);



while($sql->fetch()) 
{

$url_alterar = "editar.php?id=".$id;
$url_apagar = "apagar.php?id=".$id;

echo '<tr><td>'.$nome . '</td>';
echo  '<td>'.'<img src="data:image/jpeg;base64,'.base64_encode($imagem).'" height="69" width="69"/>'. '</td>';
echo '<td>'.$serie . '</td>';
echo '<td>'.$curso . '</td>';
echo '<td>'.$telefone . '</td>';
echo '<td>'.$usuario . '</td><td><a href="'.$url_alterar.'">EDITAR</a></td><td><a href="'.$url_apagar.'">EXCLUIR</a></td></tr>';
}


?>
</table>