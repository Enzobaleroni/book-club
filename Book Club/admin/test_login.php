<?php
require_once '../service/conexao.php';

echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Teste de Login</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; }
        h1 { color: #4361ee; }
        .success { background: #d4edda; padding: 15px; border-radius: 5px; margin: 10px 0; border-left: 4px solid #28a745; }
        .error { background: #f8d7da; padding: 15px; border-radius: 5px; margin: 10px 0; border-left: 4px solid #dc3545; }
        .info { background: #d1ecf1; padding: 15px; border-radius: 5px; margin: 10px 0; border-left: 4px solid #0c5460; }
        .warning { background: #fff3cd; padding: 15px; border-radius: 5px; margin: 10px 0; border-left: 4px solid #856404; }
        code { background: #f4f4f4; padding: 2px 6px; border-radius: 3px; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #4361ee; color: white; }
        .btn { display: inline-block; padding: 10px 20px; background: #4361ee; color: white; text-decoration: none; border-radius: 5px; margin: 5px; }
        .btn:hover { background: #3a0ca3; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>🧪 Teste de Login e Redirecionamento</h1>";

try {
    $pdo = new usePDO();
    $conn = $pdo->getInstance();
    
    // Listar todos os usuários
    echo "<h2>1️⃣ Usuários no Banco de Dados</h2>";
    $stmt = $conn->query("SELECT id, nome, email, is_admin FROM users ORDER BY is_admin DESC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($users)) {
        echo "<div class='error'>❌ Nenhum usuário encontrado!</div>";
        echo "<p>Execute o script <code>database/create_users_table.sql</code></p>";
    } else {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>is_admin</th><th>Redirecionamento</th></tr>";
        
        foreach ($users as $user) {
            $isAdmin = $user['is_admin'];
            $redirect = ($isAdmin == 1) ? "→ admin/dashboard.php" : "→ view/Book Club.php";
            $color = ($isAdmin == 1) ? "background: #d4edda;" : "background: #f8f9fa;";
            
            echo "<tr style='$color'>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['nome']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td><strong>$isAdmin</strong></td>";
            echo "<td>$redirect</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
    
    // Testar lógica de redirecionamento
    echo "<h2>2️⃣ Teste de Lógica de Redirecionamento</h2>";
    
    foreach ($users as $user) {
        $isAdmin = $user['is_admin'];
        
        echo "<div class='info'>";
        echo "<strong>Usuário:</strong> {$user['nome']} ({$user['email']})<br>";
        echo "<strong>is_admin no banco:</strong> $isAdmin<br>";
        echo "<strong>Tipo da variável:</strong> " . gettype($isAdmin) . "<br>";
        
        // Simular a verificação do controller
        if ($isAdmin == 1) {
            echo "<strong>✅ Condição if (\$_SESSION['is_admin'] == 1):</strong> TRUE<br>";
            echo "<strong>Redirecionamento:</strong> <code>../admin/dashboard.php</code>";
        } else {
            echo "<strong>❌ Condição if (\$_SESSION['is_admin'] == 1):</strong> FALSE<br>";
            echo "<strong>Redirecionamento:</strong> <code>../view/Book Club.php</code>";
        }
        
        echo "</div>";
    }
    
    // Verificar campo is_admin existe
    echo "<h2>3️⃣ Verificação da Estrutura da Tabela</h2>";
    $stmt = $conn->query("DESCRIBE users");
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $hasIsAdmin = false;
    echo "<table>";
    echo "<tr><th>Campo</th><th>Tipo</th><th>Padrão</th></tr>";
    
    foreach ($columns as $col) {
        if ($col['Field'] === 'is_admin') {
            $hasIsAdmin = true;
            echo "<tr style='background: #d4edda;'>";
        } else {
            echo "<tr>";
        }
        echo "<td>{$col['Field']}</td>";
        echo "<td>{$col['Type']}</td>";
        echo "<td>{$col['Default']}</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
    if (!$hasIsAdmin) {
        echo "<div class='error'>";
        echo "❌ <strong>Campo 'is_admin' NÃO EXISTE!</strong><br><br>";
        echo "Execute este comando SQL:<br>";
        echo "<code>ALTER TABLE users ADD COLUMN is_admin TINYINT(1) DEFAULT 0;</code>";
        echo "</div>";
    } else {
        echo "<div class='success'>✅ Campo 'is_admin' existe na tabela!</div>";
    }
    
    // Instruções finais
    echo "<h2>4️⃣ Próximos Passos</h2>";
    
    if (!empty($users)) {
        $hasAdmin = false;
        foreach ($users as $user) {
            if ($user['is_admin'] == 1) {
                $hasAdmin = true;
                break;
            }
        }
        
        if ($hasAdmin) {
            echo "<div class='success'>";
            echo "✅ Existe pelo menos um usuário admin no banco!<br><br>";
            echo "<strong>Para testar:</strong><br>";
            echo "1. Faça logout se estiver logado<br>";
            echo "2. Faça login com um usuário que tem is_admin = 1<br>";
            echo "3. Você será redirecionado para o dashboard admin<br>";
            echo "</div>";
        } else {
            echo "<div class='warning'>";
            echo "⚠️ Nenhum usuário admin encontrado!<br><br>";
            echo "<strong>Solução:</strong><br>";
            echo "1. Acesse <a href='make_admin.php'>Gerenciar Admins</a><br>";
            echo "2. Clique em 'Tornar Admin' no seu usuário<br>";
            echo "3. Faça logout e login novamente<br>";
            echo "</div>";
        }
    }
    
} catch (Exception $e) {
    echo "<div class='error'>❌ Erro: " . $e->getMessage() . "</div>";
}

echo "
        <div style='margin-top: 30px; border-top: 2px solid #ddd; padding-top: 20px;'>
            <h3>🔗 Links Úteis</h3>
            <a href='make_admin.php' class='btn'>Gerenciar Admins</a>
            <a href='debug_session.php' class='btn'>Ver Sessão Atual</a>
            <a href='check_database.php' class='btn'>Verificar Banco</a>
            <a href='../view/login.php' class='btn' style='background: #28a745;'>Ir para Login</a>
        </div>
    </div>
</body>
</html>";
?>
