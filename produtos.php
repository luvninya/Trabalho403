<?php
// ---------------------------
// Constantes de conexão
// ---------------------------
define('DBSERVER', 'localhost');  // servidor do banco de dados
define('DBUSER', 'root');         // usuário do MySQL
define('DBPASS', '');             // senha de acesso ao MySQL
define('DBBASE', 'empresa');      // nome da base de dados

// ---------------------------
// Conexão com o banco
// ---------------------------
$conexao = mysqli_connect(DBSERVER, DBUSER, DBPASS, DBBASE);

// Verifica se a conexão deu certo
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// ---------------------------
// Consulta à tabela CARGOS
// ---------------------------
$sql = "SELECT * FROM cargos";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<h2>Cargos</h2>";
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "Cargo: " . $row["Nome"] . " | Teto Salarial: R$ " . $row["TetoSalarial"] . "<br>";
    }
} else {
    echo "Nenhum cargo encontrado.<br>";
}

// ---------------------------
// Consulta à tabela SETOR
// ---------------------------
$sqlSetor = "SELECT * FROM setor";
$resultadoSetor = mysqli_query($conexao, $sqlSetor);

if (mysqli_num_rows($resultadoSetor) > 0) {
    echo "<h2>Selecione um Setor</h2>";
    echo '<select name="setor" id="setor">';
    while ($row = mysqli_fetch_assoc($resultadoSetor)) {
        // Substitua 'id' e 'Nome' pelos nomes exatos das colunas da sua tabela
        echo '<option value="' . $row['id'] . '">' . $row['Nome'] . '</option>';
    }
    echo '</select>';
} else {
    echo "Nenhum setor encontrado.";
}

// ---------------------------
// Consulta à tabela Produtos
// ---------------------------
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
    echo "Nenhum setor encontrado.";
}

// ---------------------------
// Consulta à tabela Funcionarios
// ---------------------------
$sql = "SELECT * FROM funcionarios";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<h2>Funcionarios</h2>";
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "Funcionarios: " . $row["Nome"] . "<br>";
    }
} else {
    echo "Nenhum cargo encontrado.<br>";
}

$sqlFuncionarios = "SELECT * FROM funcionarios";      
$resultadoFuncionarios = mysqli_query($conexao, $sqlFuncionarios);

if (mysqli_num_rows($resultadoFuncionarios) > 0) {
    echo "<h2>Selecione um Funcionario</h2>";
    echo '<select name="funcionarios" id="funcionarios">';
    while ($row = mysqli_fetch_assoc($resultadoFuncionarios)) {
        echo '<option value="' . $row['id'] . '">' . $row['Nome'] . '</option>';
    }
    echo '</select>';
} else {
    echo "Nenhum funcionario encontrado.";
}


// ---------------------------
// Fecha a conexão
mysqli_close($conexao);
?>
