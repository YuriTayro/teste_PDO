<?php

include_once "format.php";

$servername = "localhost"; // Endereço do servidor (normalmente localhost se estiver executando localmente)
$username = "root"; // Nome de usuário do banco de dados
//$password = ""; // Senha do banco de dados
$dbname = "test"; // Nome do banco de dados

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem sucedida!";
} catch (PDOException $e){
    echo "Erro na conexão: " .$e->getMessage();
}

$insertData = array(
    "NOME" => "Yuri",
    "IDADE" => "35"
);

//inserir no banco
$insertTable = "cadastro";
$sql = formatSql($insertData, $insertTable);

try{
    $conn->exec($sql);
    echo "Dados inseridos com sucesso!";
}catch(PDOException $e){
    echo "Erro na inserção: " .$e->getMessage();
}

$conn = null;