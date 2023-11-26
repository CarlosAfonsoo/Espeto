<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/script.js" defer></script>
    <title>Carrinho</title>
</head>
<body>

<header>
    <h1>Meu Restaurante</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cardapio.php">Cardápio</a></li>
            <li><a href="carrinho.php">Carrinho</a></li>
        </ul>
    </nav>
</header>

<!-- Aside para resumo do carrinho -->
<aside id="carrinho-summary">
    <ul>
        <li>Quantidade Total: <span id="quantidade-total">0</span></li>
        <li>Preço Total: R$ <span id="preco-total">0,00</span></li>
    </ul>
    <!-- Altere o botão de confirmar pedido -->
<button id="confirmar-pedido-btn" onclick="confirmarPedido()">Confirmar Pedido</button>

<script>
function confirmarPedido() {
    // Adicione a seguinte linha para redirecionar para a página de confirmação de pedido
    window.location.href = 'php/confirmar_pedido.php';
}
</script>

</aside>

<section>
    <h2>Carrinho</h2>
    <div id="carrinho-container">
        <?php
        session_start();

        // Verifica se a sessão carrinho existe e não está vazia
        if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
            echo '<h3>Itens no Carrinho</h3>';
            
            foreach ($_SESSION['carrinho'] as $item) {
                echo '<div class="item-carrinho">';
                echo '<p>ID: ' . $item['id'] . '</p>';
                echo '<p>Tipo: ' . $item['tipo'] . '</p>';
                echo '<p>Nome: ' . $item['nome'] . '</p>';
                echo '<p>Preço: R$ ' . number_format($item['preco'], 2, ',', '.') . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>O carrinho está vazio.</p>';
        }
        ?>
    </div>
</section>

<footer>
    <p>&copy; 2023 Meu Restaurante</p>
</footer>

</body>
</html>
