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
<a title="Sair" href="sair.php" class="bg-laranja helveticalg preto pointer text-bold m-0 p-2 pt-2 voltar "><span class="fa fa-arrow-circle-o-left" aria-hidden="true"></span> Sair</a>
        <div class="container col-md-4 border-laranja border-radius text-center">
                <label class="text-quarenta helveticalg">Novo Atraso</label>
                <form method="get" action="procurarTurma.php" class="form-group">
                        <input type="radio" name="serio" required="" value="1" class="ml-1" id="1anoo"> <label for="1anoo">1°Ano</label>
                        <input type="radio" name="serio" required="" value="2" class="ml-1" id="2anoo"> <label for="2anoo">2°Ano</label>
                        <input type="radio" name="serio" required="" value="3" class="ml-1" id="3anoo" checked=""> <label for="3anoo">3°Ano</label>
        	<br>
                        <select name="curso" class="form-control" required>
                                <option>Selecione o curso</option>
                                <option>Informática</option>
                                <option>Enfermagem</option>
                                <option>Segurança do Trabalho</option>
                                <option>Libras</option>
                                <option>Hospedagem</option>
                        </select>
                        <br><br>
                <input type="submit" value="ANOTAR" class="btn float-right text-bold laranja border-laranja bg-branco procurar pointer helveticalg">
                        <br>
                </form>
        </div>
        
</body>
</html>