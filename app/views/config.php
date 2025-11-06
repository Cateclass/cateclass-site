<?php

$host = "localhost";
$port = 3306;
$user = "root";
$password = "";
$database = "sao_benedito";

try {
    // Cria a conexão usando PDO
    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8";
    $conn = new PDO($dsn, $user, $password);
    
    // Define o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conexão bem-sucedida!"; // opcional para testar
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

?>