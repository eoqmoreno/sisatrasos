<?php
include '../conexao.php';

$email = $_POST["usuario"];
$senha = $_POST["senha"];
setcookie('user',$email);

$sql = mysqli_query($conexao,"SELECT * FROM professor WHERE usuario = '$email' AND senha = '$senha'")or die(mysqli_error($conexao));
$row=mysqli_fetch_array($sql);
$rows = mysqli_num_rows($sql);

if($rows > 0 ){
    SESSION_START();
    $_SESSION["usu"] = $_POST["usuario"];
    $_SESSION["sen"] = $_POST["senha"];
    header('location:../professor');
}else{
    echo "<script>
    alert('Senhas e Usuário não correspondem!');
    window.location = '../apontador';
    </script>";
}
?>
