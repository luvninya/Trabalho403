<?php

define('DBSERVER', 'localhost');  // servidor do banco de dados
define('DBUSER', 'root');         // usuário do MySQL
define('DBPASS', '');             // senha de acesso ao MySQL
define('DBBASE', 'empresa');      // nome da base de dados

$conexao = mysqli_connect(DBSERVER, DBUSER, DBPASS, DBBASE);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<h2>Produtos</h2>";
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "Produtos: " . $row["Nome"] . " | Preço: R$" . $row["Preco"] . "<br>";
    }
} else {
    echo "Nenhum cargo encontrado.<br>";
}

$sqlProdutos = "SELECT * FROM produtos";
$resultadoProdutos = mysqli_query($conexao, $sqlProdutos);

if (mysqli_num_rows($resultadoProdutos) > 0) {
    echo "<h2>Selecione um Produto</h2>";
    echo '<select name="produtos" id="produtos">';
    while ($row = mysqli_fetch_assoc($resultadoProdutos)) {
        echo '<option value="' . $row['id'] . '">' . $row['Nome'] . '</option>';
    }
    echo '</select>';
} else {
    echo "Nenhum produto encontrado.";
}

mysqli_close($conexao);
?>
