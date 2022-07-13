<?php
// script de pesquisa

require 'config.php';

// colunas da tabela
$columns = ['empregado_id', 'data_nascimento', 'nome', 'sobrenome', 'data_admissao'];

// nome da tabela
$table = "Empregados";

// definindo valor de campo
$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;


// Filtrando
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}


// consultando
$sql = "SELECT " . implode(", ", $columns) . "
FROM $table
$where ";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;


// Mostrando os resultados
$html = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $row['empregado_id'] . '</td>';
        $html .= '<td>' . $row['nome'] . '</td>';
        $html .= '<td>' . $row['sobrenome'] . '</td>';
        $html .= '<td>' . $row['data_nascimento'] . '</td>';
        $html .= '<td>' . $row['data_admissao'] . '</td>';
        $html .= '<td onclick="getDelete(' . $row['empregado_id'] . ')">Eliminar</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="6">Nenhum Resultado Encontrado</td>';
    $html .= '</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
