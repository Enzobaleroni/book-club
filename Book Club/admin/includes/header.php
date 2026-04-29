<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar se o usuário está logado e é admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    $_SESSION['mensagem'] = "Área restrita. Faça login como administrador.";
    $_SESSION['tipo_mensagem'] = "erro";
    header("Location: ../view/login.php");
    exit;
}

$userName = $_SESSION['user_name'] ?? 'Admin';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($currentPage); ?> - Admin Dashboard | Book Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background-color: #3a0ca3;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            color: white;
            padding: 12px 15px;
            display: block;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 5px;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover {
            background-color: #4361ee;
        }

        .sidebar .nav-link.active {
            background-color: #4cc9f0;
            color: #3a0ca3;
            font-weight: 600;
        }

        .content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 15px 0;
            border-bottom: 2px solid #dee2e6;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #3a0ca3;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #4361ee;
            border-color: #4361ee;
        }

        .btn-primary:hover {
            background-color: #3a0ca3;
            border-color: #3a0ca3;
        }

        .alert {
            border-radius: 8px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo mb-4">
            <h2>Book Club Admin</h2>
        </div>
        <nav>
            <a href="dashboard.php" class="nav-link <?php echo $currentPage == 'dashboard' ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="usuarios.php" class="nav-link <?php echo $currentPage == 'usuarios' ? 'active' : ''; ?>">
                <i class="fas fa-users"></i> Usuários
            </a>
            <a href="produtos.php" class="nav-link <?php echo $currentPage == 'produtos' ? 'active' : ''; ?>">
                <i class="fas fa-book"></i> Produtos
            </a>
            <a href="pedidos.php" class="nav-link <?php echo $currentPage == 'pedidos' ? 'active' : ''; ?>">
                <i class="fas fa-shopping-cart"></i> Pedidos
            </a>
            <a href="blog.php" class="nav-link <?php echo $currentPage == 'blog' ? 'active' : ''; ?>">
                <i class="fas fa-blog"></i> Blog
            </a>
            <a href="configuracoes.php" class="nav-link <?php echo $currentPage == 'configuracoes' ? 'active' : ''; ?>">
                <i class="fas fa-cog"></i> Configurações
            </a>
            <a href="../controller/LogoutController.php" class="nav-link">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </nav>
    </div>

    <div class="content">
        <div class="header">
            <h1 class="page-title"><?php echo ucfirst($currentPage); ?></h1>
            <div class="user-info">
                <img src="https://via.placeholder.com/40" alt="Admin">
                <span style="font-weight: 500;"><?php echo htmlspecialchars($userName); ?></span>
            </div>
        </div>

        <?php
        // Exibir mensagens de sessão
        if (isset($_SESSION['mensagem'])):
            $tipo = $_SESSION['tipo_mensagem'] ?? 'info';
            $alertClass = $tipo === 'sucesso' ? 'success' : ($tipo === 'erro' ? 'danger' : 'info');
        ?>
            <div class="alert alert-<?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['mensagem']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php
            unset($_SESSION['mensagem'], $_SESSION['tipo_mensagem']);
        endif;
        ?>
