<?php
header('Content-Type: application/json');
require_once '../service/conexao.php';

try {
    $pdo = new usePDO();
    $conn = $pdo->getInstance();
    
    // Total de usuários
    $stmt = $conn->query("SELECT COUNT(*) as total FROM users");
    $totalUsers = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Total de produtos/livros
    $stmt = $conn->query("SELECT COUNT(*) as total FROM livros");
    $totalProducts = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Pedidos pendentes (com tratamento de erro caso a tabela não exista)
    try {
        $stmt = $conn->query("SELECT COUNT(*) as total FROM orders WHERE status = 'pending'");
        $pendingOrders = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    } catch (PDOException $e) {
        $pendingOrders = 0;
    }
    
    // Novos comentários com status pendente
    try {
        $stmt = $conn->query("SELECT COUNT(*) as total FROM comments WHERE status = 'pending'");
        $newComments = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    } catch (PDOException $e) {
        $newComments = 0;
    }
    
    $stats = [
        'totalUsers' => $totalUsers,
        'totalProducts' => $totalProducts,
        'pendingOrders' => $pendingOrders,
        'newComments' => $newComments
    ];
    
    echo json_encode($stats);
    
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
