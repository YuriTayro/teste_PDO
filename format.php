<?php

function formatSql($arr, $table) {
    $columns = implode("`,`", array_keys($arr));
    $values = "'" . implode("','", $arr) . "'"; // Correção aquii

    $sql = "INSERT INTO $table (`$columns`) VALUES ($values)"; // Sem aspas em $values aqui

    return $sql;
    
}

?>
