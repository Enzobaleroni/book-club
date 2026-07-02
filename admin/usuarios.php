<?php
require_once 'includes/header.php';
require_once '../service/conexao.php';

$pdo = new usePDO();
$conn = $pdo->getInstance();

// Processar ações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_user'])) {
        $userId = $_POST['user_id'];
        try {
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $_SESSION['mensagem'] = "Usuário excluído com sucesso!";
            $_SESSION['tipo_mensagem'] = "sucesso";
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao excluir usuário: " . $e->getMessage();
            $_SESSION['tipo_mensagem'] = "erro";
        }
        header("Location: usuarios.php");
        exit;
    }
    
    if (isset($_POST['toggle_admin'])) {
        $userId = $_POST['user_id'];
        $newStatus = $_POST['is_admin'] == 1 ? 0 : 1;
        try {
            $stmt = $conn->prepare("UPDATE users SET is_admin = ? WHERE id = ?");
            $stmt->execute([$newStatus, $userId]);
            $_SESSION['mensagem'] = "Status de admin atualizado!";
            $_SESSION['tipo_mensagem'] = "sucesso";
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao atualizar: " . $e->getMessage();
            $_SESSION['tipo_mensagem'] = "erro";
        }
        header("Location: usuarios.php");
        exit;
    }
}

// Buscar usuários
$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM users WHERE nome LIKE ? OR email LIKE ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$searchTerm = "%$search%";
$stmt->execute([$searchTerm, $searchTerm]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Estatísticas
$stmt = $conn->query("SELECT COUNT(*) as total FROM users");
$totalUsers = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $conn->query("SELECT COUNT(*) as total FROM users WHERE is_admin = 1");
$totalAdmins = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
?>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-users"></i> Total de Usuários</h5>
                <h2 class="text-primary"><?php echo $totalUsers; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user-shield"></i> Administradores</h5>
                <h2 class="text-success"><?php echo $totalAdmins; ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Gerenciar Usuários</h5>
        <a href="../view/Cadastro.php" class="btn btn-primary" target="_blank">
            <i class="fas fa-plus"></i> Novo Usuário
        </a>
    </div>
    <div class="card-body">
        <!-- Busca -->
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nome ou email..." value="<?php echo htmlspecialchars($search); ?>">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="fas fa-search"></i> Buscar
                </button>
                <?php if ($search): ?>
                <a href="usuarios.php" class="btn btn-outline-secondary">
                    <i class="fas fa-times"></i> Limpar
                </a>
                <?php endif; ?>
            </div>
        </form>

        <!-- Tabela de usuários -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Data Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['nome']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td>
                            <?php if ($user['is_admin'] == 1): ?>
                                <span class="badge bg-success">Admin</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Usuário</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo date('d/m/Y H:i', strtotime($user['created_at'])); ?></td>
                        <td>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <input type="hidden" name="is_admin" value="<?php echo $user['is_admin']; ?>">
                                <button type="submit" name="toggle_admin" class="btn btn-sm btn-outline-primary" title="Alternar Admin">
                                    <i class="fas fa-user-shield"></i>
                                </button>
                            </form>
                            <?php if ($user['id'] != $_SESSION['user_id']): ?>
                            <form method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="delete_user" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
