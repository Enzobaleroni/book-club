<?php
header('Content-Type: application/json');
require_once '../service/conexao.php';

try {
    $pdo = new usePDO();
    $conn = $pdo->getInstance();
    
    // Buscar últimos pedidos
    $stmt = $conn->query("
        SELECT 
            o.id,
            o.created_at as date,
            o.status,
            u.nome as user_name,
            'order' as type
        FROM orders o
        LEFT JOIN users u ON o.user_id = u.id
        ORDER BY o.created_at DESC
        LIMIT 5
    ");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Buscar novos usuários
    $stmt = $conn->query("
        SELECT 
            id,
            nome as user_name,
            created_at as date,
            'user' as type
        FROM users
        ORDER BY created_at DESC
        LIMIT 5
    ");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Combinar e ordenar
    $activities = array_merge($orders, $users);
    usort($activities, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });
    
    // Pegar apenas os 10 mais recentes
    $activities = array_slice($activities, 0, 10);
    
    echo json_encode($activities);
    
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
