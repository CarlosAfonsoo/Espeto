function adicionarAoCarrinho(id, tipo) {
    console.log('Enviando requisição AJAX para adicionar ao carrinho...');

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            console.log('Recebido status:', this.status);
            if (this.status == 200) {
                alert('Item adicionado ao carrinho!');
            } else {
                alert('Erro ao adicionar item ao carrinho. Status: ' + this.status);
            }
        }
    };
    xhr.open("GET", "php/adicionar_carrinho.php?id=" + id + "&tipo=" + tipo, true);
    xhr.send();
}
