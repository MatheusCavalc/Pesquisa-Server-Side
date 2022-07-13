<?php

require 'config.php';

$id = $_GET['id'];

if ($_GET['acao'] == 'remover') {
    $sql = "DELETE FROM Empregados WHERE empregado_id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $conn->close();
}