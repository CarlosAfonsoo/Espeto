<?php
// session_start();
// session_unset();
// session_destroy();
// session_start();

include 'banco.php';
include 'conexao.php';

if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id = $_GET['id'];
    $tipo = $_GET['tipo'];

    $query = "SELECT * FROM $tipo WHERE id" . substr($tipo, 2) . " = $id";
    $resultado = mysqli_query($conexao, $query);

    if ($resultado) {
        $row = mysqli_fetch_assoc($resultado);

        // Aqui você pode adicionar a lógica para adicionar ao carrinho ou ao banco de dados de pedidos
        // Por exemplo, você pode usar cookies ou sessions para armazenar temporariamente no carrinho
        // ou inserir diretamente no banco de dados de pedidos.

        // Exemplo: Adicionar ao carrinho usando session
        session_start();

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }

        // Adiciona o item ao carrinho
        $_SESSION['carrinho'][] = array(
            'id' => $id,
            'tipo' => $tipo,
            'nome' => $row['nome' . substr($tipo, 2)],
            'preco' => $row['precUnit' . substr($tipo, 2)],
        );

        echo 'Item adicionado ao carrinho!';
    } else {
        echo 'Erro ao obter dados do item.';
    }
} else {
    echo 'Parâmetros inválidos.';
}
?>
