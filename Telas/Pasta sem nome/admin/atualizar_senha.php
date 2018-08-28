<?php
include '../conexao.php';
$antiga = $_POST['antiga'];
$senha = $_POST['nova'];
$conf = $_POST['conf'];
if($senha == $conf){
$sql = mysqli_query($conexao,"SELECT * FROM administrador WHERE senha = '$antiga'")or die(mysqli_error($conexao));
if(mysqli_num_rows($sql)>=1){
    $row = mysqli_fetch_assoc($sql);
    $id = $row['id']; 
    $sql1 = mysqli_query($conexao,"UPDATE administrador SET senha='$senha' WHERE id = '$id'");
    echo "<script>alert('Senha alterada com sucesso!');window.location = './sair.php'</script>";
}else{
    echo "<script>alert('Senha antiga não corresponde!');window.location = './index.php'</script>";
}
}else{
echo "<script>alert('Senha e confirmação de senha não correspondentes!');window.location = './index.php'</script>";
}
?>