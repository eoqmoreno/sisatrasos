<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">

<link rel="apple-touch-icon" sizes="57x57" href="../img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
<link rel="manifest" href="../img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- Responsividade -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="../style/style.css">

<link rel="stylesheet" href="../style/bootstrap.min.css">
<link rel="stylesheet" href="../style/bootstrap.min.css.map">
<link rel="stylesheet" href="../style/bootstrap.css">
<link rel="stylesheet" href="../style/bootstrap.css.map">

<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

<script src="../js/jquery-3.2.1.slim.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.maskedinput.min.js"></script>
<script>
		jQuery(function($){
               $(".telefone").mask("(99) 99999-9999");
               $(".cpf").mask("999.999.999-99");
		});
</script>

<nav class="navbar navbar-toggleable-md bg-cinza border-bottom-branco">

<img class="img-vinte m-0 p-0" src="../img/logoPro.png">

<button class="navbar-toggler border-radius border-laranja" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa fa-bars laranja"></span>    
  </button>
<?php
if(!isset($img) || !file_exists($img)){
    $img = "../fotos/user.png";
}
if(isset($nome) &&$nome != null){
if($tipo == "aluno"){
echo '<div class="collapse navbar-collapse text-center border-radius border-branca p-1" id="navbarNav">
                 <script>
                        window.onload = function what(){
                        
                        document.getElementById("nome").innerHTML ="'.$nome.'";
                        document.getElementById("info").innerHTML ="'.$serie.'º '.$curso.'";
                        document.getElementById("img").setAttribute("src","'.$img.'");
                        };
                 </script>
             <img id="img" class="img-foto border-laranja">
             <div class="d-inline-block align-middle m-1 text-left">
             <label id="nome" class="text-dez laranja m-0 d-block"></label>
             <label id="info" class="text-dez branco m-0"></label>
             </div>
        </div>';
}elseif($tipo=="apt"){
echo '<div class="collapse navbar-collapse text-center border-radius border-branca p-1" id="navbarNav">
                 <script>
                        window.onload = function what(){
                        
                        document.getElementById("nome").innerHTML ="'.$nome.'";
                        document.getElementById("info").innerHTML ="'.$usu.'";
                        document.getElementById("img").setAttribute("src","'.$img.'");
                        };
                 </script>
             <img id="img" class="img-foto border-laranja">
             <div class="d-inline-block m-1 text-left align-middle">
             <label id="nome" class="text-dez laranja m-0 d-block"></label>
             <label id="info" class="text-dez branco m-0"></label>
             </div>
        </div>';
}else{
echo '<div class="collapse navbar-collapse text-center border-radius border-branca p-1" id="navbarNav">
                 <script>
                        window.onload = function what(){
                        
                        document.getElementById("nome").innerHTML ="'.$nome.'";
                        document.getElementById("info").innerHTML ="'.$serie.'º '.$curso.'";
                        document.getElementById("img").setAttribute("src","'.$img.'");
                        };
                 </script>
             <img id="img" class="img-foto border-laranja">
             <div class="d-inline-block m-1 text-left align-middle">
             <label id="nome" class="text-dez laranja m-0 d-block"></label>
             <label id="info" class="text-dez branco m-0"></label>
             </div>
        </div>';
}


}else{
echo '  <div class="collapse navbar-collapse text-center" id="navbarNav">
            <a class="dropdown-item verde w-content ml-3 p-0" href="../"><span class="fa fa-home text-vinte d-inline" aria-hidden="true"></span> Página Inicial</a>
            <a class="dropdown-item verde w-content ml-3 p-0" href="../aluno"><span class="fa fa-user-circle" aria-hidden="true"></span> Aluno</a>
            <a class="dropdown-item verde w-content ml-3 p-0" href="../professor"><span class="fa fa-graduation-cap" aria-hidden="true"></span> Professor Diretor de Turma</a>
            <a class="dropdown-item verde w-content ml-3 p-0" href="../admin"><span class="fa fa-user-circle-o" aria-hidden="true"></span> Administrador</a>
            <a class="dropdown-item verde w-content ml-3 p-0" href="../apontador"><span class="fa fa-address-card" aria-hidden="true"></span> Apontador de Atraso</a>
        </div>';
}
?>
  
</nav>
<script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
<div class="bg-laranja pb-1"></div>


<div class="bg-cinza border-top-laranja text-center fixed-bottom navbar m-0 p-0 margin-top branco">
<label class="form-label m-0 p-0">
Turma 3° Ano de Informática [2015-2017]  -  Orientador de Estágio Alex Aquino 
</label>
</div>