<?php
require_once 'includes/header.php';
require_once '../service/conexao.php';

$pdo = new usePDO();
$conn = $pdo->getInstance();

// Processar alteração de senha
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $senhaAtual = $_POST['senha_atual'];
    $novaSenha = $_POST['nova_senha'];
    $confirmarSenha = $_POST['confirmar_senha'];
    
    if ($novaSenha !== $confirmarSenha) {
        $_SESSION['mensagem'] = "As senhas não coincidem!";
        $_SESSION['tipo_mensagem'] = "erro";
    } else {
        try {
            $stmt = $conn->prepare("SELECT senha FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($senhaAtual, $user['senha'])) {
                $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE users SET senha = ? WHERE id = ?");
                $stmt->execute([$novaSenhaHash, $_SESSION['user_id']]);
                
                $_SESSION['mensagem'] = "Senha alterada com sucesso!";
                $_SESSION['tipo_mensagem'] = "sucesso";
            } else {
                $_SESSION['mensagem'] = "Senha atual incorreta!";
                $_SESSION['tipo_mensagem'] = "erro";
            }
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro: " . $e->getMessage();
            $_SESSION['tipo_mensagem'] = "erro";
        }
    }
    header("Location: configuracoes.php");
    exit;
}

// Processar atualização de perfil
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    try {
        $stmt = $conn->prepare("UPDATE users SET nome = ?, email = ? WHERE id = ?");
        $stmt->execute([$_POST['nome'], $_POST['email'], $_SESSION['user_id']]);
        
        $_SESSION['user_name'] = $_POST['nome'];
        $_SESSION['user_email'] = $_POST['email'];
        $_SESSION['mensagem'] = "Perfil atualizado com sucesso!";
        $_SESSION['tipo_mensagem'] = "sucesso";
    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro: " . $e->getMessage();
        $_SESSION['tipo_mensagem'] = "erro";
    }
    header("Location: configuracoes.php");
    exit;
}

// Buscar dados do usuário
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-user"></i> Meu Perfil</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($userData['nome']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($userData['email']); ?>" required>
                    </div>
                    <button type="submit" name="update_profile" class="btn btn-primary">
                        <i class="fas fa-save"></i> Salvar Alterações
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-lock"></i> Alterar Senha</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Senha Atual</label>
                        <input type="password" name="senha_atual" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nova Senha</label>
                        <input type="password" name="nova_senha" class="form-control" required minlength="6">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmar Nova Senha</label>
                        <input type="password" name="confirmar_senha" class="form-control" required>
                    </div>
                    <button type="submit" name="change_password" class="btn btn-primary">
                        <i class="fas fa-key"></i> Alterar Senha
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle"></i> Informações do Sistema</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Versão:</strong> 1.0.0</p>
                        <p><strong>PHP:</strong> <?php echo phpversion(); ?></p>
                        <p><strong>Banco de Dados:</strong> MySQL</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Último Login:</strong> <?php echo date('d/m/Y H:i'); ?></p>
                        <p><strong>Tipo de Conta:</strong> <span class="badge bg-success">Administrador</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
