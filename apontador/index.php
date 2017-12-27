<?php
session_start(); 
include '../conexao.php';

if(!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])) {
	header('Location: login.php');
}

$usuario = $_SESSION['usuario'];
        $sql = "SELECT * FROM apontador WHERE usuario = '$usuario'";
        $dados = mysqli_query($conexao,$sql) or die (mysqli_error($conexao)); 
        $row=mysqli_fetch_array($dados);
        $nome = $row['nome'];
        $usu = $row['usuario'];
        $tipo = "apt";
?>
<html>
<?php include "../header.php" ?>

<body>
<ul class="list-inline text-center bg-cinza pt-1 pb-1">			 
            <li class="list-inline-item"><a class="laranja" href="novoatraso.php">Novo Atraso</a></li>
	    <li class="list-inline-item"><a class="laranja" href="zerarAtrasos.php">Zerar Atrasos</a></li>
	    <li class="list-inline-item"><a class="laranja" href="maisDeTres.php">Mais de 3 atrasos</a></li>
	    <li class="list-inline-item"><a class="laranja" href="editarcodigo.php">Informações do Diretor de Turma</a></li>
            <li class="list-inline-item"><a class="laranja" href="adicionardt.php">Adicionar Diretor de Turma</a></li>
            <li class="list-inline-item"><a class="laranja" href="adicionaraluno.php">Adicionar Aluno </a></li>
            <li class="list-inline-item"><a class="laranja" href="escolhaTurma.php">Gerar Relatório </a></li>
            <li class="list-inline-item"><a class="laranja" href="sair.php">Sair</a></li>
        </ul>
</body>
</html>