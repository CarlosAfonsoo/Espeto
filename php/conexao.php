<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdrestaurante";

// Cria a conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Defina o conjunto de caracteres para utf8 (se necessário)
mysqli_set_charset($conexao, "utf8");
?>
