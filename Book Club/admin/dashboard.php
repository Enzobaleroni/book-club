<?php
session_start();

// Verificar se o usuário está logado e é admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    $_SESSION['mensagem'] = "Área restrita. Faça login como administrador.";
    $_SESSION['tipo_mensagem'] = "erro";
    header("Location: ../view/login.php");
    exit;
}

$userName = $_SESSION['user_name'] ?? 'Admin';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Book Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            padding: 10px 15px;
            display: block;
            text-decoration: none;
            border-radius: 5px;
        }

        .sidebar .nav-link:hover {
            background-color: #4361ee;
        }

        .sidebar .nav-link.active {
            background-color: #4cc9f0;
            color: #3a0ca3;
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
            border-bottom: 1px solid #dee2e6;
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

        .stats-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .stats-card h3 {
            margin-bottom: 10px;
            color: #3a0ca3;
        }

        .stats-card p {
            font-size: 24px;
            font-weight: bold;
            color: #4cc9f0;
        }

        .recent-activity {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .activity-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h2>Book Club Admin</h2>
        </div>
        <nav class="mt-4">
            <a href="dashboard.php" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="usuarios.php" class="nav-link">
                <i class="fas fa-users"></i> Usuários
            </a>
            <a href="./produtos.php" class="nav-link">
                <i class="fas fa-book"></i> Produtos
            </a>
            <a href="./pedidos.php" class="nav-link">
                <i class="fas fa-shopping-cart"></i> Pedidos
            </a>
            <a href="blog.php" class="nav-link">
                <i class="fas fa-blog"></i> Blog
            </a>
            <a href="settings.php" class="nav-link">
                <i class="fas fa-cog"></i> Configurações
            </a>
            <a href="../controller/LogoutController.php" class="nav-link">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </nav>
    </div>

    <div class="content">
        <div class="header">
            <h2>Dashboard</h2>
            <div class="user-info">
                <img src="../view/a arte da guerra.webp" alt="Admin">
             
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="stats-card">
                    <h3>Total de Usuários</h3>
                    <p id="total-users">0</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <h3>Total de Produtos</h3>
                    <p id="total-products">0</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <h3>Pedidos Pendentes</h3>
                    <p id="pending-orders">0</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <h3>Novos Comentários</h3>
                    <p id="new-comments">0</p>
                </div>
            </div>
        </div>

        <div class="recent-activity mt-4">
            <h3>Atividades Recentes</h3>
            <div id="recent-activities">
                <!-- Atividades serão carregadas via JavaScript -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Carregar estatísticas do banco de dados
        async function loadStats() {
            try {
                const response = await fetch('get_stats.php');
                const stats = await response.json();
                
                if (stats.error) {
                    console.error('Erro ao carregar estatísticas:', stats.error);
                    return;
                }
                
                document.getElementById('total-users').textContent = stats.totalUsers;
                document.getElementById('total-products').textContent = stats.totalProducts;
                document.getElementById('pending-orders').textContent = stats.pendingOrders;
                document.getElementById('new-comments').textContent = stats.newComments;
            } catch (error) {
                console.error('Erro ao carregar estatísticas:', error);
            }
        }
        
        // Carregar atividades recentes
        async function loadActivities() {
            try {
                const response = await fetch('get_activities.php');
                const activities = await response.json();
                
                if (activities.error) {
                    console.error('Erro ao carregar atividades:', activities.error);
                    return;
                }
                
                const container = document.getElementById('recent-activities');
                container.innerHTML = '';
                
                activities.forEach(activity => {
                    const activityItem = document.createElement('div');
                    activityItem.className = 'activity-item';
                    
                    const icon = activity.type === 'order' ? 'fa-shopping-cart' : 'fa-user';
                    const color = activity.type === 'order' ? '#4cc9f0' : '#3a0ca3';
                    const text = activity.type === 'order' 
                        ? `Pedido #${activity.id} - ${activity.user_name} - ${activity.status}`
                        : `Novo usuário: ${activity.user_name}`;
                    
                    activityItem.innerHTML = `
                        <i class="fas ${icon}" style="color: ${color}; margin-right: 15px; font-size: 20px;"></i>
                        <div style="flex: 1;">
                            <p style="margin: 0; font-weight: 500;">${text}</p>
                            <small style="color: #666;">${new Date(activity.date).toLocaleString('pt-BR')}</small>
                        </div>
                    `;
                    container.appendChild(activityItem);
                });
            } catch (error) {
                console.error('Erro ao carregar atividades:', error);
            }
        }
        
        // Carregar dados ao iniciar
        document.addEventListener('DOMContentLoaded', () => {
            loadStats();
            loadActivities();
            
            // Atualizar a cada 30 segundos
            setInterval(() => {
                loadStats();
                loadActivities();
            }, 30000);
        });
    </script>
</body>
</html>
