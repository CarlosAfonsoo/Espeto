<?php
// Função para exibir o cardápio
function exibirCardapio($tabela)
{
    global $conexao;

    $query = "SELECT * FROM $tabela";
    $resultado = mysqli_query($conexao, $query);

    if ($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<div class="item-cardapio">';
            echo '<img src="imgs/' . $row['img' . substr($tabela, 2)] . '" alt="' . $row['nome' . substr($tabela, 2)] . '">';
            echo '<p><strong>' . $row['nome' . substr($tabela, 2)] . '</strong></p>';
            echo '<p>Preço: R$ ' . number_format($row['precUnit' . substr($tabela, 2)], 2, ',', '.') . '</p>';
            echo '<button onclick="adicionarAoCarrinho(' . $row['id' . substr($tabela, 2)] . ', \'' . $tabela . '\')">Adicionar ao Carrinho</button>';
            echo '</div>';
        }
    } else {
        echo 'Erro ao obter dados do cardápio.';
    }
}
?>
