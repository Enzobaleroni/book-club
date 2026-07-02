<?php
/**
 * Script de Teste de Conexão com o Banco de Dados
 * Acesse: http://localhost/Book-Club/Book%20Club/admin/test_connection.php
 */

require_once '../service/conexao.php';

echo "<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Teste de Conexão - Book Club</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        body { padding: 40px; background-color: #f8f9fa; }
        .test-container { max-width: 800px; margin: 0 auto; }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .info { color: #17a2b8; }
        .card { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class='test-container'>
        <h1 class='mb-4'>🔍 Teste de Conexão - Book Club</h1>";

try {
    $pdo = new usePDO();
    $conn = $pdo->getInstance();
    
    echo "<div class='card'>
            <div class='card-body'>
                <h3 class='success'>✅ Conexão com o banco de dados estabelecida!</h3>
                <p>Banco: <strong>book_club</strong></p>
            </div>
          </div>";
    
    // Testar tabelas
    $tables = ['users', 'livros', 'categorias', 'orders', 'order_items', 'comments'];
    
    echo "<div class='card'>
            <div class='card-body'>
                <h4>📊 Verificação das Tabelas</h4>
                <table class='table table-striped'>";
    
    foreach ($tables as $table) {
        try {
            $stmt = $conn->query("SELECT COUNT(*) as count FROM $table");
            $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
            echo "<tr>
                    <td><strong>$table</strong></td>
                    <td class='success'>✅ Existe</td>
                    <td class='info'>$count registro(s)</td>
                  </tr>";
        } catch (PDOException $e) {
            echo "<tr>
                    <td><strong>$table</strong></td>
                    <td class='error'>❌ Não encontrada</td>
                    <td class='error'>Execute o script schema.sql</td>
                  </tr>";
        }
    }
    
    echo "</table>
          </div>
        </div>";
    
    // Testar APIs
    echo "<div class='card'>
            <div class='card-body'>
                <h4>🔗 Verificação das APIs</h4>
                <ul class='list-group'>";
    
    $baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    
    echo "<li class='list-group-item'>
            <strong>Estatísticas:</strong> 
            <a href='get_stats.php' target='_blank'>$baseUrl/get_stats.php</a>
          </li>
          <li class='list-group-item'>
            <strong>Atividades:</strong> 
            <a href='get_activities.php' target='_blank'>$baseUrl/get_activities.php</a>
          </li>
          <li class='list-group-item'>
            <strong>Dashboard:</strong> 
            <a href='dashboard.php' target='_blank'>$baseUrl/dashboard.php</a>
          </li>";
    
    echo "</ul>
          </div>
        </div>";
    
    // Instruções
    echo "<div class='alert alert-info'>
            <h5>📝 Próximos Passos:</h5>
            <ol>
                <li>Se alguma tabela não existe, execute <code>database/schema.sql</code></li>
                <li>Para adicionar dados de teste, execute <code>database/sample_data.sql</code></li>
                <li>Acesse o <a href='dashboard.php'>Dashboard</a> para ver os dados</li>
            </ol>
          </div>";
    
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>
            <h3 class='error'>❌ Erro de Conexão!</h3>
            <p><strong>Mensagem:</strong> " . $e->getMessage() . "</p>
            <hr>
            <h5>Possíveis Soluções:</h5>
            <ul>
                <li>Verifique se o MySQL está rodando no XAMPP</li>
                <li>Confirme as credenciais em <code>service/conexao.php</code></li>
                <li>Certifique-se que o banco 'book_club' existe</li>
            </ul>
          </div>";
}

echo "    </div>
</body>
</html>";
?>
