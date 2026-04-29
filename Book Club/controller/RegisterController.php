<?php
session_start();
require_once '../service/conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['password'] ?? '';
    $confirmarSenha = $_POST['confirmPassword'] ?? '';
    
    // Validações
    $erros = [];
    
    if (empty($nome)) {
        $erros[] = "Nome completo é obrigatório.";
    }
    
    if (empty($email)) {
        $erros[] = "E-mail é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "E-mail inválido.";
    }
    
    if (empty($senha)) {
        $erros[] = "Senha é obrigatória.";
    } elseif (strlen($senha) < 6) {
        $erros[] = "A senha deve ter pelo menos 6 caracteres.";
    }
    
    if ($senha !== $confirmarSenha) {
        $erros[] = "As senhas não coincidem.";
    }
    
    // Se houver erros, retorna para o cadastro
    if (!empty($erros)) {
        $_SESSION['mensagem'] = implode("<br>", $erros);
        $_SESSION['tipo_mensagem'] = "erro";
        header("Location: ../view/Cadastro.php");
        exit;
    }
    
    try {
        $pdo = new usePDO();
        $conn = $pdo->getInstance();
        
        // Verificar se o e-mail já existe
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            $_SESSION['mensagem'] = "Este e-mail já está cadastrado.";
            $_SESSION['tipo_mensagem'] = "erro";
            header("Location: ../view/Cadastro.php");
            exit;
        }
        
        // Hash da senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        
        // Inserir novo usuário
        $sql = "INSERT INTO users (nome, email, senha, is_admin, created_at) VALUES (?, ?, ?, 0, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nome, $email, $senhaHash]);
        
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso! Faça login para continuar.";
        $_SESSION['tipo_mensagem'] = "sucesso";
        header("Location: ../view/login.php");
        exit;
        
    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro ao realizar cadastro: " . $e->getMessage();
        $_SESSION['tipo_mensagem'] = "erro";
        header("Location: ../view/Cadastro.php");
        exit;
    }
} else {
    // Se não for POST, redireciona para o cadastro
    header("Location: ../view/Cadastro.php");
    exit;
}
?>
