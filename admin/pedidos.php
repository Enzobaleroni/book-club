<?php
// pedidos.php - CORRIGIDO
session_start(); // ADICIONE ESTA LINHA NO TOPO

require_once 'includes/header.php';
require_once '../service/conexao.php';

$pdo = new usePDO();
$conn = $pdo->getInstance();

// ========== CRIAR TABELAS SE NÃO EXISTIREM (ANTES DE QUALQUER SAÍDA) ==========
try {
    // Criar tabela users se não existir
    $conn->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        email VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Criar tabela orders se não existir
    $conn->exec("CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        total DECIMAL(10,2) DEFAULT 0.00,
        status VARCHAR(50) DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
} catch (Exception $e) {
    // Silencioso - apenas para criar se não existir
}

// ========== ATUALIZAR STATUS DO PEDIDO ==========
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    try {
        // Validar e sanitizar
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $order_id = (int)$_POST['order_id'];
        
        if ($order_id <= 0) {
            throw new Exception('ID inválido');
        }
        
        $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
        $stmt->execute([$status, $order_id]);
        
        $_SESSION['mensagem'] = "Status atualizado com sucesso!";
        $_SESSION['tipo_mensagem'] = "sucesso";
    } catch (Exception $e) {
        $_SESSION['mensagem'] = "Erro: " . $e->getMessage();
        $_SESSION['tipo_mensagem'] = "erro";
    }
    
    // REDIRECIONAMENTO IMEDIATO - ANTES DE QUALQUER HTML
    header("Location: pedidos.php");
    exit;
}

// ========== BUSCAR PEDIDOS ==========
$status = $_GET['status'] ?? '';
$allowed_statuses = ['pending', 'processing', 'completed', 'cancelled'];

// Validar status
if ($status && !in_array($status, $allowed_statuses)) {
    $status = '';
}

$sql = "SELECT o.*, u.nome as cliente_nome, u.email as cliente_email 
        FROM orders o 
        LEFT JOIN users u ON o.user_id = u.id";

if ($status) {
    $sql .= " WHERE o.status = ? ORDER BY o.created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$status]);
} else {
    $sql .= " ORDER BY o.created_at DESC";
    $stmt = $conn->query($sql);
}

$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ========== ESTATÍSTICAS ==========
$stats = [
    'total' => $conn->query("SELECT COUNT(*) as count FROM orders")->fetch()['count'],
    'pending' => $conn->query("SELECT COUNT(*) as count FROM orders WHERE status = 'pending'")->fetch()['count'],
    'processing' => $conn->query("SELECT COUNT(*) as count FROM orders WHERE status = 'processing'")->fetch()['count'],
    'completed' => $conn->query("SELECT COUNT(*) as count FROM orders WHERE status = 'completed'")->fetch()['count']
];

// AGORA SIM COMEÇA O HTML
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos - Book Club</title>
    <!-- Seu CSS aqui -->
</head>
<body>
<!-- Restante do seu HTML... -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6>Total de Pedidos</h6>
                <h2 class="text-primary"><?php echo $stats['total']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6>Pendentes</h6>
                <h2 class="text-warning"><?php echo $stats['pending']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6>Em Processamento</h6>
                <h2 class="text-info"><?php echo $stats['processing']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6>Concluídos</h6>
                <h2 class="text-success"><?php echo $stats['completed']; ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Gerenciar Pedidos</h5>
    </div>
    <div class="card-body">
        <!-- Filtros -->
        <div class="mb-3">
            <a href="pedidos.php" class="btn btn-sm <?php echo !$status ? 'btn-primary' : 'btn-outline-primary'; ?>">Todos</a>
            <a href="?status=pending" class="btn btn-sm <?php echo $status == 'pending' ? 'btn-warning' : 'btn-outline-warning'; ?>">Pendentes</a>
            <a href="?status=processing" class="btn btn-sm <?php echo $status == 'processing' ? 'btn-info' : 'btn-outline-info'; ?>">Em Processamento</a>
            <a href="?status=completed" class="btn btn-sm <?php echo $status == 'completed' ? 'btn-success' : 'btn-outline-success'; ?>">Concluídos</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>#<?php echo $order['id']; ?></td>
                        <td><?php echo htmlspecialchars($order['cliente_nome'] ?? 'N/A'); ?></td>
                        <td>R$ <?php echo number_format($order['total'], 2, ',', '.'); ?></td>
                        <td>
                            <?php
                            $badges = [
                                'pending' => 'warning',
                                'processing' => 'info',
                                'completed' => 'success',
                                'cancelled' => 'danger'
                            ];
                            $badgeClass = $badges[$order['status']] ?? 'secondary';
                            ?>
                            <span class="badge bg-<?php echo $badgeClass; ?>"><?php echo ucfirst($order['status']); ?></span>
                        </td>
                        <td><?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-info" onclick='viewOrder(<?php echo $order['id']; ?>)'>
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-primary" onclick='changeStatus(<?php echo json_encode($order); ?>)'>
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Alterar Status -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Alterar Status do Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="order_id" id="status_order_id">
                    <div class="mb-3">
                        <label class="form-label">Novo Status</label>
                        <select name="status" id="status_select" class="form-select" required>
                            <option value="pending">Pendente</option>
                            <option value="processing">Em Processamento</option>
                            <option value="completed">Concluído</option>
                            <option value="cancelled">Cancelado</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" name="update_status" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function changeStatus(order) {
    document.getElementById('status_order_id').value = order.id;
    document.getElementById('status_select').value = order.status;
    new bootstrap.Modal(document.getElementById('statusModal')).show();
}

function viewOrder(orderId) {
    window.location.href = `pedido_detalhes.php?id=${orderId}`;
}
</script>

<?php require_once 'includes/footer.php'; ?>
