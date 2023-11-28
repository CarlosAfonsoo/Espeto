<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Confirme seu Pedido</title>
</head>
<body>
<header>
    <h1>Meu Restaurante</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cardapio.php">Cardápio</a></li>
            <li><a href="carrinho.php">Carrinho</a></li>
            <li><a href="dados_cliente.php">Preencha</a></li>
        </ul>
    </nav>
</header>

    <div class="container pt-3 border rounded border-left-0 mt-3 pb-3 shadow-sm p-3 mb-5 bg-white rounded">
        <form action="php/confirmar_pedido.php" method="post" autocomplete="on">
            <h3>Confirme seu Pedido</h3>
            <br>
            <div class="form-group">
                <label for="client-name">Insira seu nome</label>
                <input type="text" class="form-control " id="client-name" placeholder="Nome Completo">
            </div>
            <div class="form-group">
                <label for="client-number">Insira seu número para receber o código de verificação</label>
                <input type="tel" class="form-control" id="client-number"  required pattern="+55[0-9]{2}-[9]{1}-[0-9]{4}-[0-9]{4}">
                <small class="form-text text-monospace">Insira neste formato (11) 9XXXX-XXXX.</small>  
            </div>
            <div class="form-group">
            <label for="codigo_verificacao">Código de Verificação:</label>
            <input class="form-control" type="text" id="codigo_verificacao" name="codigo_verificacao" required>
            <small class="form-text text-monospace">Verifique sua mensagem ou e-mail para o código.</small>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    
</body>
</html>