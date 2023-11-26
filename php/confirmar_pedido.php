<?php
include 'conexao.php';
include 'banco.php';

// Inicia a sessão
session_start();

// Verifica se a sessão carrinho existe e não está vazia
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    // Calcula o preço total
    $precoTotal = 0;
    foreach ($_SESSION['carrinho'] as $item) {
        $precoTotal += $item['preco'];
    }

    // Obtém a quantidade de cada tipo de item
    $qntEspeto = 0;
    $qntBebida = 0;
    $qntSobremesa = 0;

    // Obtém os IDs de cada tipo de produto
    $idespetos = null;
    $idbebidas = null;
    $idsobremesas = null;

    foreach ($_SESSION['carrinho'] as $item) {
        switch ($item['tipo']) {
            case 'tbespetos':
                $qntEspeto++;
                $idespetos = $item['id'];
                break;
            case 'tbbebidas':
                $qntBebida++;
                $idbebidas = $item['id'];
                break;
            case 'tbsobremesas':
                $qntSobremesa++;
                $idsobremesas = $item['id'];
                break;
        }
    }

    // Insere os dados no banco de pedidos
    $query = "INSERT INTO tbpedido (idespetos, idbebidas, idsobremesas, qntespetos, qntbebidas, qntsobremesas, totalpedidos) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $query);

    if ($stmt) {
        // Binda os parâmetros
        mysqli_stmt_bind_param($stmt, "iiiiidd", $idespetos, $idbebidas, $idsobremesas, $qntEspeto, $qntBebida, $qntSobremesa, $precoTotal);

        // Executa a declaração
        mysqli_stmt_execute($stmt);

        // Fecha a declaração
        mysqli_stmt_close($stmt);

        // Limpa a sessão do carrinho após o pedido ser confirmado
        unset($_SESSION['carrinho']);

        echo 'Pedido confirmado com sucesso!';
    } else {
        echo 'Erro ao preparar a declaração: ' . mysqli_error($conexao);
    }
} else {
    echo 'O carrinho está vazio.';
}
?>
