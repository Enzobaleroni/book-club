<?php
session_start();

echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Debug de Sessão</title>
    <style>
        body { font-family: monospace; padding: 20px; background: #1e1e1e; color: #d4d4d4; }
        .container { max-width: 900px; margin: 0 auto; }
        h1 { color: #4ec9b0; }
        .info-box { background: #2d2d2d; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #4ec9b0; }
        .session-var { background: #1e1e1e; padding: 10px; margin: 5px 0; border-radius: 4px; }
        .key { color: #9cdcfe; }
        .value { color: #ce9178; }
        .status-ok { color: #4ec9b0; }
        .status-error { color: #f48771; }
        .btn { display: inline-block; padding: 10px 20px; background: #0e639c; color: white; text-decoration: none; border-radius: 5px; margin: 5px; }
        .btn:hover { background: #1177bb; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>🔍 Debug de Sessão - Book Club</h1>";

// Verificar se está logado
if (isset($_SESSION['user_id'])) {
    echo "<div class='info-box'>";
    echo "<h2 class='status-ok'>✅ Usuário está LOGADO</h2>";
    
    echo "<h3>Variáveis de Sessão:</h3>";
    foreach ($_SESSION as $key => $value) {
        echo "<div class='session-var'>";
        echo "<span class='key'>$key</span>: ";
        echo "<span class='value'>" . htmlspecialchars(print_r($value, true)) . "</span>";
        echo "</div>";
    }
    
    // Análise específica do is_admin
    echo "<h3>Análise do is_admin:</h3>";
    $isAdmin = $_SESSION['is_admin'] ?? 'NÃO DEFINIDO';
    echo "<div class='session-var'>";
    echo "Valor: <span class='value'>$isAdmin</span><br>";
    echo "Tipo: <span class='value'>" . gettype($isAdmin) . "</span><br>";
    
    if ($isAdmin == 1) {
        echo "<span class='status-ok'>✅ É ADMIN (deveria ir para dashboard)</span>";
    } elseif ($isAdmin == 0 || $isAdmin === 0) {
        echo "<span class='status-error'>❌ NÃO é admin (vai para Book Club.php)</span>";
    } else {
        echo "<span class='status-error'>⚠️ Valor inválido ou não definido</span>";
    }
    echo "</div>";
    
    // Verificar no banco
    require_once '../service/conexao.php';
    try {
        $pdo = new usePDO();
        $conn = $pdo->getInstance();
        
        $userId = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT id, nome, email, is_admin FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo "<h3>Dados no Banco de Dados:</h3>";
        if ($user) {
            echo "<div class='session-var'>";
            foreach ($user as $key => $value) {
                echo "<span class='key'>$key</span>: <span class='value'>" . htmlspecialchars($value) . "</span><br>";
            }
            echo "</div>";
            
            echo "<h3>Comparação Sessão vs Banco:</h3>";
            echo "<div class='session-var'>";
            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == $user['is_admin']) {
                echo "<span class='status-ok'>✅ is_admin na sessão CORRESPONDE ao banco</span>";
            } else {
                echo "<span class='status-error'>❌ is_admin na sessão DIFERENTE do banco!</span><br>";
                echo "Sessão: " . ($_SESSION['is_admin'] ?? 'não definido') . " | Banco: " . $user['is_admin'];
                echo "<br><br><strong>Solução: Faça logout e login novamente para atualizar a sessão!</strong>";
            }
            echo "</div>";
        }
        
    } catch (Exception $e) {
        echo "<div class='session-var status-error'>Erro ao consultar banco: " . $e->getMessage() . "</div>";
    }
    
    echo "</div>";
    
    echo "<div class='info-box'>";
    echo "<h3>🔄 Ações:</h3>";
    echo "<a href='../controller/LogoutController.php' class='btn'>Fazer Logout</a>";
    echo "<a href='make_admin.php' class='btn'>Gerenciar Admins</a>";
    echo "<a href='check_database.php' class='btn'>Verificar Banco</a>";
    echo "</div>";
    
} else {
    echo "<div class='info-box'>";
    echo "<h2 class='status-error'>❌ Usuário NÃO está logado</h2>";
    echo "<p>Não há variáveis de sessão de usuário.</p>";
    echo "<a href='../view/login.php' class='btn'>Fazer Login</a>";
    echo "</div>";
}

echo "    </div>
</body>
</html>";
?>
