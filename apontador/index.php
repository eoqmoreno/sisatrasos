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
            <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#novoatraso" aria-expanded="false" aria-controls="collapseExample">Novo Atraso</a></li>
	    <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#zerar" aria-expanded="false" aria-controls="collapseExample">Zerar Atrasos</a></li>
	    <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#maistres" aria-expanded="false" aria-controls="collapseExample">Mais de 3 atrasos</a></li>
	    <li class="list-inline-item"><a class="laranja" href="editarcodigo.php">Informações do Diretor de Turma</a></li>
            <li class="list-inline-item"><a class="laranja" href="adicionardt.php">Adicionar Diretor de Turma</a></li>
            <li class="list-inline-item"><a class="laranja" href="adicionaraluno.php">Adicionar Aluno </a></li>
            <li class="list-inline-item"><a class="laranja" href="escolhaTurma.php">Gerar Relatório </a></li>
            <li class="list-inline-item"><a class="laranja" href="sair.php">Sair</a></li>
        </ul>

        <div class="collapse" id="novoatraso">
                <div class="container col-md-4 border-laranja border-radius text-center">
                <label class="text-quarenta helveticalg">Novo Atraso</label>
                <form method="get" action="procuraraluno.php" class="add">
                        <input type="radio" name="serio" required="" value="1" class="ml-1" id="1ano"> <label for="1ano">1°Ano</label>
                        <input type="radio" name="serio" required="" value="2" class="ml-1" id="2ano"> <label for="2ano">2°Ano</label>
                        <input type="radio" name="serio" required="" value="3" class="ml-1" id="3ano" checked=""> <label for="3ano">3°Ano</label>
        	<br>
                        <select name="curso" class="levar p-1" required="">
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
        </div>

        <div class="collapse" id="zerar">
                <div class="container col-md-4 border-laranja border-radius text-center">
                <form method="get" action="zerarAtrasos.php">
                <label class="text-vinte helveticalg">Deseja realmente apagar os atrasos</label><br>
                <input type="submit" value="SIM" class="btn text-bold laranja border-laranja bg-branco procurar pointer helveticalg">
                </form>
                </div>
        </div>

        <div class="collapse" id="maistres">
                <div class="container col-md-12 border-laranja border-radius text-center">
                <label class="text-quarenta helveticalg">Aluno</label>
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
                $query = "SELECT * FROM alunos WHERE qtdAtraso>=3";
                
                $dados = mysqli_query($conexao,$query); 
                
                while($row=mysqli_fetch_array($dados)) 
                {
                
                $url_alterar = "addInfoAtraso.php?id=".$row["id"];
                $url_apagar = "apagarAluno.php?id=".$row["id"];
                $url_ver = "verAtrasos.php?id=".$row["id"];
                $url_editar = "editarAluno.php?id=".$row["id"];
                
                echo '<tr><td>'.$row["nome"] . '</td>';
                echo  '<td>'.'<img src="'.$row['foto'].'" height="69" width="69"/>'. '</td>';
                echo '<td>'.$row["serie"] . '</td>';
                echo '<td>'.$row["curso"] . '</td>';
                echo '<td>'.$row["telaluno"] . '</td>';
                echo '<td>'.$row["telresponsavel"] . '</td>';
                echo '<td>'.$row["email"] . '</td>';
                echo '<td>'.$row["qtdAtraso"] . '</td>';
                echo '<td>'.$row["numeroSige"] . '</td><td><a href="'.$url_ver.'">VER ATRASOS</a></td><td><a href="'.$url_alterar.'">ADICIONAR ATRASO</a></td><td><a href="'.$url_apagar.'">EXCLUIR</a></td><td><a href="'.$url_editar.'">EDITAR</a></td></tr>';
                }
                ?>
                </tr>
                </tbody>
                </table>
                </div>
        </div>

</body>
</html>