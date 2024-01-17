<?php
// Verifica se a requisição é do tipo POST e se há dados no corpo da requisição
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['carrinho'])) {
    // Obtém os dados do carrinho do JSON
    $carrinhoJson = $_POST['carrinho'];

    // Verifica se o JSON é uma string válida
    $carrinhoItens = json_decode($carrinhoJson, true);

    // Verifica se a decodificação do JSON foi bem-sucedida
    if ($carrinhoItens === null && json_last_error() !== JSON_ERROR_NONE) {
        $errorMessage = 'Erro ao decodificar os dados do carrinho. Detalhes: ' . json_last_error_msg();
        error_log($errorMessage);
        $response = ['success' => false, 'message' => $errorMessage];
        echo json_encode($response);
        exit();
    }

    // Calcula o valor total do carrinho
    $valorTotal = 0;
    foreach ($carrinhoItens as $item) {
        // Verifica se os campos necessários estão presentes em cada item
        if (isset($item['quantidade'], $item['precoUnitario'])) {
            $valorTotal += $item['quantidade'] * $item['precoUnitario'];
        } else {
            $errorMessage = 'Cada item do carrinho deve ter os campos "quantidade" e "precoUnitario".';
            error_log($errorMessage);
            $response = ['success' => false, 'message' => $errorMessage];
            echo json_encode($response);
            exit();
        }
    }

    // Pode realizar mais ações aqui, como salvar o pedido no banco de dados, enviar e-mails, etc.

    // Prepara a resposta para o JavaScript
    $response = [
        'success' => true,
        'message' => 'Pagamento realizado com sucesso!',
        'valorTotal' => $valorTotal
    ];
    echo json_encode($response);
} else {
    // Se não houver dados no POST, retorna uma mensagem de erro
    $errorMessage = 'Nenhum dado de carrinho recebido na requisição.';
    error_log($errorMessage);
    $response = ['success' => false, 'message' => $errorMessage];
    echo json_encode($response);
}
?>
