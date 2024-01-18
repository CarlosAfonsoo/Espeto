var carrinhoItens = [];

function adicionarAoCarrinho(nomeProduto, valorUnitario) {
    var itemCarrinho = document.getElementById('item_' + nomeProduto);

    if (itemCarrinho) {
        var quantidadeAtual = parseInt(itemCarrinho.dataset.quantidade) || 1;
        quantidadeAtual++;
        itemCarrinho.innerHTML = `<div class="itemCarrinho"><p>${nomeProduto} - R$${valorUnitario.toFixed(2)} - Quantidade: ${quantidadeAtual}</p><button onclick="removerDoCarrinho('${nomeProduto}', ${valorUnitario})">-</button></div>`;
        itemCarrinho.dataset.quantidade = quantidadeAtual;

        var index = carrinhoItens.findIndex(item => item.nome === nomeProduto);
        carrinhoItens[index].quantidade = quantidadeAtual;
    } else {
        itemCarrinho = document.createElement('div');
        itemCarrinho.id = 'item_' + nomeProduto;
        itemCarrinho.dataset.quantidade = 1;
        itemCarrinho.innerHTML = `<div class="itemCarrinho"><p>${nomeProduto} - R$${valorUnitario.toFixed(2)} - Quantidade: 1</p><button onclick="removerDoCarrinho('${nomeProduto}', ${valorUnitario})">-</button></div>`;
        document.getElementById('itensCarrinho').appendChild(itemCarrinho);

        carrinhoItens.push({
            nome: nomeProduto,
            quantidade: 1,
            precoUnitario: valorUnitario
        });
    }

    atualizarTotalCarrinho(valorUnitario, true);
}

function removerDoCarrinho(nomeProduto, valorUnitario) {
    var itemCarrinho = document.getElementById('item_' + nomeProduto);

    if (itemCarrinho) {
        var quantidadeAtual = parseInt(itemCarrinho.dataset.quantidade) || 0;

        if (quantidadeAtual > 1) {
            quantidadeAtual--;
            itemCarrinho.innerHTML = `<div class="itemCarrinho"><p>${nomeProduto} - R$${valorUnitario.toFixed(2)} - Quantidade: ${quantidadeAtual}</p><button onclick="removerDoCarrinho('${nomeProduto}', ${valorUnitario})">-</button></div>`;
            itemCarrinho.dataset.quantidade = quantidadeAtual;

            var index = carrinhoItens.findIndex(item => item.nome === nomeProduto);
            carrinhoItens[index].quantidade = quantidadeAtual;
        } else {
            // Remover o item do carrinho se a quantidade for 1 ou menos
            itemCarrinho.parentNode.removeChild(itemCarrinho);

            carrinhoItens = carrinhoItens.filter(item => item.nome !== nomeProduto);
        }

        atualizarTotalCarrinho(valorUnitario, false);
    }
}

function atualizarTotalCarrinho(valorItem, adicionar) {
    var totalCarrinho = document.getElementById('totalCarrinho');
    var valorTotal = parseFloat(totalCarrinho.dataset.valorTotal) || 0;

    if (adicionar) {
        valorTotal += valorItem;
    } else {
        valorTotal -= valorItem;
    }

    valorTotal = Math.max(valorTotal, 0);

    totalCarrinho.innerHTML = `<p>Total: R$${valorTotal.toFixed(2)}</p>`;
    totalCarrinho.dataset.valorTotal = valorTotal;
}


function esvaziarCarrinho() {
    if (carrinhoItens.length > 0) {
        atualizarTotalCarrinho(parseFloat(document.getElementById('totalCarrinho').dataset.valorTotal), false);

        carrinhoItens = [];

        var itensCarrinho = document.getElementById('itensCarrinho');
        itensCarrinho.innerHTML = '';
    }
}

function pagar() {
// Exiba os dados do carrinho em um alert para depuração
alert(JSON.stringify(carrinhoItens, null, 2));

// Enviar dados do carrinho para o PHP usando AJAX
$.ajax({
type: 'POST',
url: 'php/exemplo.php',
data: { carrinho: JSON.stringify(carrinhoItens, null, 2) }, // Formatação para facilitar a leitura
success: function(response) {
    // Lógica de sucesso aqui (se necessário)
    alert("Pagamento realizado com sucesso!");

    // Redirecionar para a página PHP após o processamento no PHP
    window.location.href = 'php/exemplo.php';
},
error: function(error) {
    // Lógica de tratamento de erro aqui (se necessário)
    console.error('Erro ao realizar o pagamento:', error);
    alert('Erro ao realizar o pagamento. Por favor, tente novamente.');
}
});
}