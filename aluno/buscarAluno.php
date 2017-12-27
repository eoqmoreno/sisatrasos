<?php 
        $sia = $_POST['sige'];
        include '../conexao.php';
        
        $sql = "SELECT * FROM alunos WHERE numeroSige = '$sia'";
        $dados = mysqli_query($conexao,$sql) or die (mysqli_error($conexao)); 
        
        if(mysqli_num_rows($dados) == 0) {
        echo"<script>
        alert('Usuário não cadastrado!');
        window.location.href = 'index.php';
        </script>";
        }else {
        $row=mysqli_fetch_array($dados);
        $img=$row['foto'];
        $situacao = $row['qtdAtraso'];
        $sige = $row['numeroSige'];
        $nome = $row['nome'];
        $curso = $row['curso'];
        $serie = $row['serie'];
        $tipo = "aluno";
}
?>
<html>
    <head>
        <title>Página do Aluno</title>
    </head>
    <?php
        include '../header.php'
    ?>
    <body class="bg-branco">
        <a title="voltar" class="bg-laranja helveticalg preto pointer text-bold m-0 p-2 pt-2 voltar" onclick="voltar()"><span class="fa fa-arrow-circle-o-left" aria-hidden="true"></span> Voltar</a> 
         
        <div class="container mb-6">
        <div class="row justify-content-around">
        <!-- Atrasos Atuais-->
        <div class="col-md-5 border-cinza border-top-cinza border-radius pt-3 pb-2 pr-5 pl-5 mt-5 text-center">
                <label class="text-vinte vermelho">ATRASOS ATUAIS</label>
                
                  <div class="table-responsive">
               <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">DATA</th>
                            <th class="text-center">HORÁRIO</th>
                            <th class="text-center">JUSTIFICADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM atraso WHERE numeroSige='$sige' AND antigo = 0";
                        $dados = mysqli_query($conexao,$query); 
                        
                        if ($situacao>=1) {
                            while($row = mysqli_fetch_array($dados)) {
                                echo '<tr>';
                                echo '<td class="text-center">'.$row["horario"].'</td>';
                                echo '<td class="text-center">'.$row["data"].'</td>';
                                if($row['motivo'] != "Falta nao justificada") {
                                    echo '<td class="text-center">SIM</td></tr>';
                                }else{
                                    echo '<td class="text-center">NÃO</td></tr>';
                                }
                                }
                                }else if($situacao==0) {
                                    echo "";
                                }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
        <!-- Atrasos antigos -->
        <div class="col-md-5 border-cinza border-top-cinza border-radius pt-3 pb-2 pr-5 pl-5 mt-5 text-center">
            <label class="text-vinte laranja">ATRASOS ANTIGOS</label>
                
            <div class="table-responsive">
               <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">DATA</th>
                            <th class="text-center">HORÁRIO</th>
                            <th class="text-center">JUSTIFICADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query1 = "SELECT * FROM atraso WHERE numeroSige='$sige' AND antigo = 1";
                        $dados1 = mysqli_query($conexao,$query1); 
                        while($row = mysqli_fetch_array($dados1)) {
                            echo '<tr>';
                            echo '<td class="text-center">'.$row["horario"].'</td>';
                            echo '<td class="text-center">'.$row["data"].'</td>';
                            if($row['motivo'] != "Falta nao justificada") {
                                echo '<td class="text-center">SIM</td></tr>';
                            }else{
                                echo '<td class="text-center">NÃO</td></tr>';
                            }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>

</body>
</html>