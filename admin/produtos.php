<?php
require_once 'includes/header.php';
require_once '../service/conexao.php';

$pdo = new usePDO();
$conn = $pdo->getInstance();

// Verificar estrutura da tabela categorias
try {
    $stmt = $conn->query("DESCRIBE categorias");
    $categoriaColumns = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $hasDescricaoColumn = in_array('descricao', $categoriaColumns);
} catch (Exception $e) {
    $hasDescricaoColumn = false;
}

// Processar ações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Adicionar produto
    if (isset($_POST['add_product'])) {
        try {
            $sql = "INSERT INTO livros (titulo, autor, ano_publicacao, categoria_id, preco, estoque, descricao, disponibilidade) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $_POST['titulo'],
                $_POST['autor'],
                $_POST['ano_publicacao'],
                $_POST['categoria_id'],
                $_POST['preco'],
                $_POST['estoque'],
                $_POST['descricao'],
                1
            ]);
            $_SESSION['mensagem'] = "Produto adicionado com sucesso!";
            $_SESSION['tipo_mensagem'] = "sucesso";
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao adicionar produto: " . $e->getMessage();
            $_SESSION['tipo_mensagem'] = "erro";
        }
        header("Location: produtos.php");
        exit;
    }
    
    // Excluir produto
    if (isset($_POST['delete_product'])) {
        try {
            $stmt = $conn->prepare("DELETE FROM livros WHERE id = ?");
            $stmt->execute([$_POST['product_id']]);
            $_SESSION['mensagem'] = "Produto excluído com sucesso!";
            $_SESSION['tipo_mensagem'] = "sucesso";
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao excluir produto: " . $e->getMessage();
            $_SESSION['tipo_mensagem'] = "erro";
        }
        header("Location: produtos.php");
        exit;
    }
    
    // Atualizar produto
    if (isset($_POST['update_product'])) {
        try {
            $sql = "UPDATE livros SET titulo=?, autor=?, ano_publicacao=?, categoria_id=?, preco=?, estoque=?, descricao=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $_POST['titulo'],
                $_POST['autor'],
                $_POST['ano_publicacao'],
                $_POST['categoria_id'],
                $_POST['preco'],
                $_POST['estoque'],
                $_POST['descricao'],
                $_POST['product_id']
            ]);
            $_SESSION['mensagem'] = "Produto atualizado com sucesso!";
            $_SESSION['tipo_mensagem'] = "sucesso";
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao atualizar produto: " . $e->getMessage();
            $_SESSION['tipo_mensagem'] = "erro";
        }
        header("Location: produtos.php");
        exit;
    }
    
    // Adicionar categoria
    if (isset($_POST['add_categoria'])) {
        try {
            if ($hasDescricaoColumn) {
                $sql = "INSERT INTO categorias (nome, descricao) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$_POST['nome_categoria'], $_POST['descricao_categoria']]);
            } else {
                $sql = "INSERT INTO categorias (nome) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$_POST['nome_categoria']]);
            }
            $_SESSION['mensagem'] = "Categoria adicionada com sucesso!";
            $_SESSION['tipo_mensagem'] = "sucesso";
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao adicionar categoria: " . $e->getMessage();
            $_SESSION['tipo_mensagem'] = "erro";
        }
        header("Location: produtos.php");
        exit;
    }
    
    // Excluir categoria
    if (isset($_POST['delete_categoria'])) {
        try {
            // Verificar se há produtos vinculados a esta categoria
            $checkStmt = $conn->prepare("SELECT COUNT(*) as total FROM livros WHERE categoria_id = ?");
            $checkStmt->execute([$_POST['categoria_id']]);
            $result = $checkStmt->fetch();
            
            if ($result['total'] > 0) {
                $_SESSION['mensagem'] = "Não é possível excluir a categoria pois existem produtos vinculados a ela!";
                $_SESSION['tipo_mensagem'] = "erro";
            } else {
                $stmt = $conn->prepare("DELETE FROM categorias WHERE id = ?");
                $stmt->execute([$_POST['categoria_id']]);
                $_SESSION['mensagem'] = "Categoria excluída com sucesso!";
                $_SESSION['tipo_mensagem'] = "sucesso";
            }
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao excluir categoria: " . $e->getMessage();
            $_SESSION['tipo_mensagem'] = "erro";
        }
        header("Location: produtos.php");
        exit;
    }
    
    // Atualizar categoria
    if (isset($_POST['update_categoria'])) {
        try {
            if ($hasDescricaoColumn) {
                $sql = "UPDATE categorias SET nome = ?, descricao = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $_POST['nome_categoria'],
                    $_POST['descricao_categoria'],
                    $_POST['categoria_id']
                ]);
            } else {
                $sql = "UPDATE categorias SET nome = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $_POST['nome_categoria'],
                    $_POST['categoria_id']
                ]);
            }
            $_SESSION['mensagem'] = "Categoria atualizada com sucesso!";
            $_SESSION['tipo_mensagem'] = "sucesso";
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao atualizar categoria: " . $e->getMessage();
            $_SESSION['tipo_mensagem'] = "erro";
        }
        header("Location: produtos.php");
        exit;
    }
}

// Buscar produtos
$search = $_GET['search'] ?? '';
$sql = "SELECT l.*, c.nome as categoria_nome 
        FROM livros l 
        LEFT JOIN categorias c ON l.categoria_id = c.id 
        WHERE l.titulo LIKE ? OR l.autor LIKE ? 
        ORDER BY l.created_at DESC";
$stmt = $conn->prepare($sql);
$searchTerm = "%$search%";
$stmt->execute([$searchTerm, $searchTerm]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Buscar categorias - ajustar consulta conforme estrutura da tabela
if ($hasDescricaoColumn) {
    $categorias = $conn->query("SELECT * FROM categorias ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);
} else {
    $categorias = $conn->query("SELECT id, nome FROM categorias ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);
    // Adicionar descricao vazia para todas as categorias
    foreach ($categorias as &$cat) {
        $cat['descricao'] = '';
    }
}

// Estatísticas
$totalProdutos = $conn->query("SELECT COUNT(*) as total FROM livros")->fetch()['total'];
$estoqueTotal = $conn->query("SELECT SUM(estoque) as total FROM livros")->fetch()['total'] ?? 0;
?>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-book"></i> Total de Produtos</h5>
                <h2 class="text-primary"><?php echo $totalProdutos; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-box"></i> Estoque Total</h5>
                <h2 class="text-success"><?php echo $estoqueTotal; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-tags"></i> Categorias</h5>
                <h2 class="text-info"><?php echo count($categorias); ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Card de Produtos -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-book"></i> Gerenciar Produtos</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="fas fa-plus"></i> Novo Produto
                </button>
            </div>
            <div class="card-body">
                <!-- Busca -->
                <form method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar produtos..." value="<?php echo htmlspecialchars($search); ?>">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                        <?php if ($search): ?>
                        <a href="produtos.php" class="btn btn-outline-secondary">
                            <i class="fas fa-times"></i> Limpar
                        </a>
                        <?php endif; ?>
                    </div>
                </form>

                <!-- Tabela de produtos -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Categoria</th>
                                <th>Preço</th>
                                <th>Estoque</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo htmlspecialchars($product['titulo']); ?></td>
                                <td><?php echo htmlspecialchars($product['autor']); ?></td>
                                <td><?php echo htmlspecialchars($product['categoria_nome'] ?? 'Sem categoria'); ?></td>
                                <td>R$ <?php echo number_format($product['preco'], 2, ',', '.'); ?></td>
                                <td>
                                    <span class="badge <?php echo $product['estoque'] > 10 ? 'bg-success' : ($product['estoque'] > 0 ? 'bg-warning' : 'bg-danger'); ?>">
                                        <?php echo $product['estoque']; ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info" onclick='editProduct(<?php echo json_encode($product); ?>)'>
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza?');">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <button type="submit" name="delete_product" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Card de Categorias -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-tags"></i> Categorias</h5>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoriaModal">
                    <i class="fas fa-plus"></i> Nova
                </button>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <?php foreach ($categorias as $categoria): ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong><?php echo htmlspecialchars($categoria['nome']); ?></strong>
                            <?php if ($hasDescricaoColumn && !empty($categoria['descricao'])): ?>
                            <br><small class="text-muted"><?php echo htmlspecialchars($categoria['descricao']); ?></small>
                            <?php endif; ?>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-outline-info" onclick='editCategoria(<?php echo json_encode($categoria); ?>)'>
                                <i class="fas fa-edit"></i>
                            </button>
                            <form method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                                <input type="hidden" name="categoria_id" value="<?php echo $categoria['id']; ?>">
                                <button type="submit" name="delete_categoria" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Adicionar Produto -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ano</label>
                            <input type="number" name="ano_publicacao" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Autor</label>
                            <input type="text" name="autor" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Categoria</label>
                            <select name="categoria_id" class="form-select" required>
                                <option value="">Selecione...</option>
                                <?php foreach ($categorias as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['nome']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Preço</label>
                            <input type="number" step="0.01" name="preco" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estoque</label>
                            <input type="number" name="estoque" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="add_product" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Produto -->
<div class="modal fade" id="editProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <input type="hidden" name="product_id" id="edit_product_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="titulo" id="edit_titulo" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ano</label>
                            <input type="number" name="ano_publicacao" id="edit_ano" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Autor</label>
                            <input type="text" name="autor" id="edit_autor" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Categoria</label>
                            <select name="categoria_id" id="edit_categoria" class="form-select" required>
                                <?php foreach ($categorias as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['nome']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Preço</label>
                            <input type="number" step="0.01" name="preco" id="edit_preco" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estoque</label>
                            <input type="number" name="estoque" id="edit_estoque" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" id="edit_descricao" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="update_product" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Adicionar Categoria -->
<div class="modal fade" id="addCategoriaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nome da Categoria</label>
                        <input type="text" name="nome_categoria" class="form-control" required>
                    </div>
                    <?php if ($hasDescricaoColumn): ?>
                    <div class="mb-3">
                        <label class="form-label">Descrição (opcional)</label>
                        <textarea name="descricao_categoria" class="form-control" rows="3"></textarea>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="add_categoria" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Categoria -->
<div class="modal fade" id="editCategoriaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <input type="hidden" name="categoria_id" id="edit_categoria_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nome da Categoria</label>
                        <input type="text" name="nome_categoria" id="edit_categoria_nome" class="form-control" required>
                    </div>
                    <?php if ($hasDescricaoColumn): ?>
                    <div class="mb-3">
                        <label class="form-label">Descrição (opcional)</label>
                        <textarea name="descricao_categoria" id="edit_categoria_descricao" class="form-control" rows="3"></textarea>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="update_categoria" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editProduct(product) {
    document.getElementById('edit_product_id').value = product.id;
    document.getElementById('edit_titulo').value = product.titulo;
    document.getElementById('edit_autor').value = product.autor;
    document.getElementById('edit_ano').value = product.ano_publicacao;
    document.getElementById('edit_categoria').value = product.categoria_id;
    document.getElementById('edit_preco').value = product.preco;
    document.getElementById('edit_estoque').value = product.estoque;
    document.getElementById('edit_descricao').value = product.descricao || '';
    new bootstrap.Modal(document.getElementById('editProductModal')).show();
}

function editCategoria(categoria) {
    document.getElementById('edit_categoria_id').value = categoria.id;
    document.getElementById('edit_categoria_nome').value = categoria.nome;
    <?php if ($hasDescricaoColumn): ?>
    document.getElementById('edit_categoria_descricao').value = categoria.descricao || '';
    <?php endif; ?>
    new bootstrap.Modal(document.getElementById('editCategoriaModal')).show();
}
</script>

<?php require_once 'includes/footer.php'; ?>