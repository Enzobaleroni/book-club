<?php
session_start();
require_once '../service/conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['password'] ?? '';
    
    // Validação básica
    if (empty($email) || empty($senha)) {
        $_SESSION['mensagem'] = "Por favor, preencha todos os campos.";
        $_SESSION['tipo_mensagem'] = "erro";
        header("Location: ../view/login.php");
        exit;
    }
    
    try {
        $pdo = new usePDO();
        $conn = $pdo->getInstance();
        
        // Buscar usuário por email
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verificar se o usuário existe e a senha está correta
        if ($user && password_verify($senha, $user['senha'])) {
            // Login bem-sucedido
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['is_admin'] = $user['is_admin'] ?? 0;
            $_SESSION['mensagem'] = "Login realizado com sucesso!";
            $_SESSION['tipo_mensagem'] = "sucesso";
            
            // Redirecionar admin para o dashboard
            if ($_SESSION['is_admin'] == 1) {
                header("Location: ../admin/dashboard.php");
            } else {
                header("Location: ../view/Book Club.php");
            }
            exit;
        } else {
            // Login falhou
            $_SESSION['mensagem'] = "E-mail ou senha incorretos.";
            $_SESSION['tipo_mensagem'] = "erro";
            header("Location: ../view/login.php");
            exit;
        }
        
    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro ao realizar login: " . $e->getMessage();
        $_SESSION['tipo_mensagem'] = "erro";
        header("Location: ../view/login.php");
        exit;
    }
} else {
    // Se não for POST, redireciona para o login
    header("Location: ../view/login.php");
    exit;
}
