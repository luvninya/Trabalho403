<?php
// Conexão com o banco
define('DBSERVER', 'localhost');  
define('DBUSER', 'root');         
define('DBPASS', '');             
define('DBBASE', 'loja');      

$conexao = mysqli_connect(DBSERVER, DBUSER, DBPASS, DBBASE);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja Clube Social</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
  <ul>
    <li>
	<div class="logo-div"><img class="logo" src="Fotos/Imagens/logo_club.webp" alt="">
    <h1>Loja Clube Social</h1></div></li>
    <nav>
      <li><a href="#">Início</a></li>
      <li><a href="#produtos">Produtos</a></li>
      <li><a href="#contato">Contato</a></li>
      <li><span id="carrinho">🛒 0</span></li>
      <li><section id="pesquisa"></li>
        <input type="text" id="barra-pesquisa" placeholder="Pesquisar produto...">
      </section></li>
	</ul>
    </nav>
  </header>
 
  <main>
    <section id="banner">
      <h2>Promoção Especial!</h2>
      <p>Compre Clube Social com descontos exclusivos!!</p>
    </section>

    <section id="produtos">
        <h2>Nossos Produtos</h2>
        <div class="grid">
            <?php
            if (mysqli_num_rows($resultado) > 0) {
                while($produto = mysqli_fetch_assoc($resultado)) {
                    echo '<div class="produto">';
                    echo '<img src="./produtos/'. $produto['imagem'] .'" alt="'. $produto['nome_produto'] .'">';
                    echo '<h3>'. $produto['nome_produto'] .'</h3>';
                    echo '<p>De R$ '. number_format($produto['preco_anterior'], 2, ',', '.') .'</p>';
                    echo '<p>Por R$ '. number_format($produto['preco'], 2, ',', '.') .'</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            ?>
        </div>
    </section>

    <section id="selecao-produtos">
        <h2>Selecione um Produto</h2>
        <form>
            <select name="produtos" id="produtos">
                <?php
                mysqli_data_seek($resultado, 0);
                while ($produto = mysqli_fetch_assoc($resultado)) {
                    echo '<option value="' . $produto['id_produto'] . '">' . $produto['nome_produto'] . '</option>';
                }
                ?>
            </select>
            <button type="submit">Selecionar</button>
        </form>
    </section>

    <section id="contato">
      <h2>Fale Conosco</h2>
      <form>
        <input type="text" placeholder="Seu nome" required>
        <input type="email" placeholder="Seu email" required>
        <textarea placeholder="Mensagem"></textarea>
        <button type="submit">Enviar</button>
      </form>
    </section>
  </main>
 
  <footer>
    <p>2025 Loja Clube Social - Todos os direitos reservados.</p>
  </footer>
 
  <script src="script.js"></script>
</body>
</html>

<?php
mysqli_close($conexao);
?>
