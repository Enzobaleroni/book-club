<?php
require_once '../service/conexao.php';

echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Verificação do Banco de Dados</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .success { color: green; }
        .error { color: red; }
        .info { color: blue; }
        table { border-collapse: collapse; width: 100%; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4361ee; color: white; }
    </style>
</head>
<body>
    <h1>🔍 Verificação do Banco de Dados</h1>";

try {
    $pdo = new usePDO();
    $conn = $pdo->getInstance();
    
    echo "<p class='success'>✅ Conexão estabelecida com sucesso!</p>";
    
    // Verificar qual banco está sendo usado
    $stmt = $conn->query("SELECT DATABASE() as current_db");
    $currentDb = $stmt->fetch(PDO::FETCH_ASSOC)['current_db'];
    echo "<p class='info'><strong>Banco atual:</strong> $currentDb</p>";
    
    // Listar todas as tabelas
    echo "<h2>Tabelas no banco '$currentDb':</h2>";
    $stmt = $conn->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if (empty($tables)) {
        echo "<p class='error'>❌ Nenhuma tabela encontrada no banco de dados!</p>";
        echo "<p><strong>Solução:</strong> Execute o arquivo <code>database/schema.sql</code></p>";
    } else {
        echo "<table>";
        echo "<tr><th>Tabela</th><th>Registros</th></tr>";
        foreach ($tables as $table) {
            try {
                $stmt = $conn->query("SELECT COUNT(*) as count FROM `$table`");
                $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
                echo "<tr><td>$table</td><td>$count</td></tr>";
            } catch (PDOException $e) {
                echo "<tr><td>$table</td><td class='error'>Erro ao contar</td></tr>";
            }
        }
        echo "</table>";
    }
    
    // Verificar especificamente a tabela users
    echo "<h2>Verificação da tabela 'users':</h2>";
    if (in_array('users', $tables)) {
        echo "<p class='success'>✅ Tabela 'users' existe!</p>";
        
        // Mostrar estrutura da tabela
        echo "<h3>Estrutura da tabela:</h3>";
        $stmt = $conn->query("DESCRIBE users");
        $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<table>";
        echo "<tr><th>Campo</th><th>Tipo</th><th>Nulo</th><th>Chave</th><th>Padrão</th></tr>";
        foreach ($columns as $col) {
            echo "<tr>";
            echo "<td>{$col['Field']}</td>";
            echo "<td>{$col['Type']}</td>";
            echo "<td>{$col['Null']}</td>";
            echo "<td>{$col['Key']}</td>";
            echo "<td>{$col['Default']}</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // Verificar se tem o campo is_admin
        $hasIsAdmin = false;
        foreach ($columns as $col) {
            if ($col['Field'] === 'is_admin') {
                $hasIsAdmin = true;
                break;
            }
        }
        
        if (!$hasIsAdmin) {
            echo "<p class='error'>⚠️ Campo 'is_admin' não encontrado!</p>";
            echo "<p><strong>Execute este comando SQL:</strong></p>";
            echo "<pre>ALTER TABLE users ADD COLUMN is_admin TINYINT(1) DEFAULT 0 AFTER data_nascimento;</pre>";
        } else {
            echo "<p class='success'>✅ Campo 'is_admin' existe!</p>";
        }
        
    } else {
        echo "<p class='error'>❌ Tabela 'users' NÃO existe!</p>";
        echo "<p><strong>Solução:</strong> Execute o arquivo <code>database/schema.sql</code> no phpMyAdmin</p>";
    }
    
} catch (Exception $e) {
    echo "<p class='error'>❌ Erro: " . $e->getMessage() . "</p>";
}

echo "</body></html>";
?>
