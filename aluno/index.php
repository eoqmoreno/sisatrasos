<html>
    <head>
        <title>Página do Aluno</title>
    </head>
    <?php
        include '../header.php'
    ?>
    <body class="bg-branco">
        <a title="voltar" class="bg-laranja preto pointer text-bold m-0 p-2 pt-2 voltar" onclick="voltar()"><span class="fa fa-arrow-circle-o-left" aria-hidden="true"></span> Voltar</a> 
        <div class="container col-md-4 border-laranja border-radius pt-3 pb-2 pr-5 pl-5 mt-5 text-center">
            <label class="text-quarenta helveticalg">Página do Aluno</label>

            <form action="buscarAluno.php" class="m-0 p-0 mt-2" method="post">
                <input class="form-control" required autofocus type="number" name="sige" placeholder="Número do SIGE">
                <input type="submit" value="PROCURAR" class="btn float-right mt-1 text-bold laranja border-laranja bg-branco procurar pointer"><br><br>
            </form>
        </div>
</body>
</html>