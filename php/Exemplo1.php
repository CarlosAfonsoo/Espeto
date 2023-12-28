<?php

// Recebe os dados enviados via POST
$data = file_get_contents("php://input");

// Verifica se há dados recebidos
if ($data) {
    // Decodifica a string JSON para um array associativo
    $carrinhoItens = json_decode($data, true);

    // Verifica se a decodificação foi bem-sucedida
    if ($carrinhoItens !== null) {
        // Calcula o valor total
        $valorTotal = 0;
        foreach ($carrinhoItens as $item) {
            $valorTotal += $item['precoUnitario'] * $item['quantidade'];
        }

        // Armazena o valor total no banco de dados usando MySQLi
        $mysqli = new mysqli("localhost", "root", "", "bdespeto");

        // Verifica a conexão
        if ($mysqli->connect_error) {
            die("Falha na conexão: " . $mysqli->connect_error);
        }

        // Prepara a declaração SQL
        $stmt = $mysqli->prepare("INSERT INTO tbpedido (prcTotal, Pg) VALUES (?, 0)");

        // Vincula os parâmetros
        $stmt->bind_param("d", $valorTotal);

        // Executa a declaração
        if ($stmt->execute()) {
            echo "Valor total armazenado com sucesso!";
        } else {
            echo "Erro ao armazenar o valor total: " . $stmt->error;
        }

        // Fecha a declaração e a conexão
        $stmt->close();
        $mysqli->close();
    } else {
        // Exibe uma mensagem de erro se a decodificação falhou
        http_response_code(400);
        echo "Erro ao decodificar os dados JSON.";
    }
} else {
    // Exibe uma mensagem se não houver dados recebidos
    http_response_code(400);
    echo "Nenhum dado recebido.";
}
?>
