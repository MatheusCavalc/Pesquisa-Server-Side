<?php
//script de conexao com o banco de dados

// criando conexao
$conn = new mysqli("localhost", "root", "password", "Armazem");

// se houver erro
if ($conn->connect_error) {
    die('Erro de conexao ' . $conn->connect_error);
}
