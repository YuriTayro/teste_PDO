<?php

include_once "format.php";

$servername = "localhost";
$username = "root";
//$password = ""; // Se você tiver uma senha, descomente esta linha e insira a senha
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username); //conecçao com o banco de dados
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";
} catch(PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

// Dados para inserção
$insertData = array (
    "NOME" => "João",
    "IDADE" => "38"
);

// Montar e executar a consulta preparada
$insertTable = "Cadastro";
$sql = formatSql($insertData, $insertTable);

try {
    $stmt = $conn->prepare($sql);

    // Verificar se o nome já existe antes de inserir
    if (!nomeExiste($conn, $insertData["NOME"])) {
        $stmt->execute(array_values($insertData));
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Nome já existe na tabela.";
    }
} catch(PDOException $e) {
    echo "Erro na inserção: " . $e->getMessage();
}

// Fechar a conexão com o banco de dados
$conn = null;

?>
