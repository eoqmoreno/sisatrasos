<style>
    body {
        height: auto !important;
        font-size: 20px;
        font-family: 'Bitter', serif;
        color: #fff;
    }

</style>

<style>
    body {
        height: auto !important;
        font-size: 20px;
        font-family: 'Bitter', serif;
        color: #fff;
    }

    .sasuke {
    margin: 210 auto;
    text-align: center;
        width: 1393px !important;
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
<?php 
include '../conexao.php';

?>


<script type="text/javascript" src="jquery-2.2.4.js"></script> <script type="text/javascript" src="jquery.mask.min.js"></script>
     <script>
         jQuery(function($){
              $('#horario').mask('00h00m');
        });
    </script>

<?php include "header.php" ?>

<div class="back"><h5><a href="novoatraso.php">Voltar</a></h5></div>
<div class="sasuke">

    <h1> ALUNOS </h1>


<div id="alunos">
<table class="detes">

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

   <tr>

<?php 
$query = "SELECT * FROM alunos WHERE qtdAtraso>=3";

$dados = mysqli_query($conexao,$query); 

while($row=mysqli_fetch_array($dados)) 
{

$url_alterar = "addInfoAtraso.php?id=".$row["id"];
$url_apagar = "apagarAluno.php?id=".$row["id"];
$url_ver = "verAtrasos.php?id=".$row["id"];
$url_editar = "editarAluno.php?id=".$row["id"];

echo '<tr><td>'.$row["nome"] . '</td>';
echo  '<td>'.'<img src="data:image/jpeg;base64,'.base64_encode($row['foto'] ).'" height="69" width="69"/>'. '</td>';
echo '<td>'.$row["serie"] . '</td>';
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


</table></div>

</div>
</body>
</html>