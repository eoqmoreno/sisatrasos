<?php 
include '../conexao.php';

?>
<html>
<body>
<title>Informações DTS</title>
<?php include "../header.php" ?>
    <script type="text/javascript" src="jquery-2.2.4.js"></script> <script type="text/javascript" src="jquery.mask.min.js"></script>
    <script src="busca-js.js"></script>

<div class="back"><h5><a href="index.php">Voltar</a></h5></div>

<div class="nabucodonosor">
<h1> INFORMAÇÕES DT'S </h1>
<form>

<label>BUSCAR</label><input type="text" class="levar" name="buscarat" id="busca">

    
</form>
<div id="resultado">
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
$query = "SELECT * FROM detes ORDER BY nome";
$dados = mysqli_query($conexao,$query); 

while($row=mysqli_fetch_array($dados,MYSQL_ASSOC)) 
{

$url_alterar = "editar.php?id=".$row["id"];
$url_apagar = "apagar.php?id=".$row["id"];

echo '<tr><td>'.$row["nome"] . '</td>';
echo  '<td>'.'<img src="data:image/jpeg;base64,'.base64_encode($row['imagem'] ).'" height="69" width="69"/>'. '</td>';
echo '<td>'.$row["serie"] . '</td>';
echo '<td>'.$row["curso"] . '</td>';
echo '<td>'.$row["telefone"] . '</td>';
echo '<td>'.$row["usuario"] . '</td><td><a href="'.$url_alterar.'">EDITAR</a></td><td><a href="'.$url_apagar.'">EXCLUIR</a></td></tr>';
}
?>

</table></div>

</div>

</body>
</html>