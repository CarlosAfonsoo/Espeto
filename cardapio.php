<?php include 'php/conexao.php'; ?>
<?php include 'php/banco.php'; ?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/script.js"></script>
    <title>Cardápio</title>
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

<section>
    <h2>Cardápio</h2>

    <!-- Espetos -->
    <h3>Espetos</h3>
    <div class="cardapio-container">
        <?php exibirCardapio('tbespetos'); ?>
    </div>

    <!-- Sobremesas -->
    <h3>Sobremesas</h3>
    <div class="cardapio-container">
        <?php exibirCardapio('tbsobremesas'); ?>
    </div>

    <!-- Bebidas -->
    <h3>Bebidas</h3>
    <div class="cardapio-container">
        <?php exibirCardapio('tbbebidas'); ?>
    </div>
</section>

<footer>
    <p>&copy; 2023 Meu Restaurante</p>
</footer>

</body>
</html>
