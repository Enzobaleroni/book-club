<?php
require_once '../service/conexao.php';

echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Gerenciar Administradores</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #4361ee; }
        .success { color: green; padding: 10px; background: #d4edda; border-radius: 5px; margin: 10px 0; }
        .error { color: red; padding: 10px; background: #f8d7da; border-radius: 5px; margin: 10px 0; }
        table { border-collapse: collapse; width: 100%; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #4361ee; color: white; }
        .admin-badge { background: #28a745; color: white; padding: 3px 8px; border-radius: 3px; font-size: 0.8em; }
        .user-badge { background: #6c757d; color: white; padding: 3px 8px; border-radius: 3px; font-size: 0.8em; }
        .btn { display: inline-block; padding: 8px 15px; background: #4361ee; color: white; text-decoration: none; border-radius: 5px; border: none; cursor: pointer; }
        .btn:hover { background: #3a0ca3; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #c82333; }
        form { display: inline; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>👥 Gerenciar Administradores</h1>";

try {
    $pdo = new usePDO();
    $conn = $pdo->getInstance();
    
    // Processar ações POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['make_admin'])) {
            $userId = $_POST['user_id'];
            $stmt = $conn->prepare("UPDATE users SET is_admin = 1 WHERE id = ?");
            $stmt->execute([$userId]);
            echo "<div class='success'>✅ Usuário promovido a administrador!</div>";
        }
        
        if (isset($_POST['remove_admin'])) {
            $userId = $_POST['user_id'];
            $stmt = $conn->prepare("UPDATE users SET is_admin = 0 WHERE id = ?");
            $stmt->execute([$userId]);
            echo "<div class='success'>✅ Privilégios de admin removidos!</div>";
        }
    }
    
    // Listar todos os usuários
    $stmt = $conn->query("SELECT id, nome, email, is_admin, created_at FROM users ORDER BY is_admin DESC, created_at DESC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h2>Todos os Usuários</h2>";
    echo "<p>Total: " . count($users) . " usuários</p>";
    
    if (empty($users)) {
        echo "<div class='error'>❌ Nenhum usuário encontrado no banco de dados!</div>";
    } else {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Tipo</th><th>Data Cadastro</th><th>Ações</th></tr>";
        
        foreach ($users as $user) {
            $isAdmin = $user['is_admin'] == 1;
            $badge = $isAdmin ? "<span class='admin-badge'>ADMIN</span>" : "<span class='user-badge'>Usuário</span>";
            $date = date('d/m/Y H:i', strtotime($user['created_at']));
            
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['nome']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>$badge</td>";
            echo "<td>$date</td>";
            echo "<td>";
            
            if ($isAdmin) {
                echo "<form method='POST' onsubmit='return confirm(\"Remover privilégios de admin?\");'>";
                echo "<input type='hidden' name='user_id' value='{$user['id']}'>";
                echo "<button type='submit' name='remove_admin' class='btn btn-danger'>Remover Admin</button>";
                echo "</form>";
            } else {
                echo "<form method='POST'>";
                echo "<input type='hidden' name='user_id' value='{$user['id']}'>";
                echo "<button type='submit' name='make_admin' class='btn'>Tornar Admin</button>";
                echo "</form>";
            }
            
            echo "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
    
    // Instruções
    echo "<div style='margin-top: 30px; padding: 20px; background: #e7f3ff; border-left: 4px solid #4361ee;'>";
    echo "<h3>📋 Como usar:</h3>";
    echo "<ol>";
    echo "<li>Encontre o usuário que deseja tornar administrador</li>";
    echo "<li>Clique em <strong>Tornar Admin</strong></li>";
    echo "<li>O usuário poderá acessar o painel admin no próximo login</li>";
    echo "</ol>";
    echo "<p><strong>Dica:</strong> Faça logout e login novamente após se tornar admin.</p>";
    echo "</div>";
    
} catch (Exception $e) {
    echo "<div class='error'>❌ Erro: " . $e->getMessage() . "</div>";
}

echo "        <div style='margin-top: 20px;'>
            <a href='dashboard.php' class='btn'>← Voltar ao Dashboard</a>
            <a href='check_database.php' class='btn' style='background: #6c757d;'>Verificar Banco</a>
        </div>
    </div>
</body>
</html>";
?>
