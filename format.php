<?php

function formatSql($arr, $table) {
    // Obter os nomes das colunas da tabela
    $columns = implode("`,`", array_keys($arr));

    // Criar placeholders para os valores dos campos
    $placeholders = implode(",", array_fill(0, count($arr), "?"));

    // Montar a consulta SQL usando os nomes das colunas e os placeholders
    $sql = "INSERT INTO $table (`$columns`) VALUES ($placeholders)";

    // Retorna a consulta SQL formatada
    return $sql;
}

function nomeExiste($conn, $nome) {
    $query = "SELECT COUNT(*) FROM Cadastro WHERE NOME = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$nome]);

    return $stmt->fetchColumn() > 0;
}

?>
