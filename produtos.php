<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "produtos"

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>

<?php
$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);
?>
