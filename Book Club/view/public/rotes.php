<?php
session_start();
 
require_once __DIR__ . '/app/controllers/AuthController.php';
require_once __DIR__ . '/app/controllers/AdminController.php';
 
$auth = new AuthController();
$admin = new AdminController();
 
// Captura a rota da URL (ex: /login, /dashboard)
$page = $_GET['page'] ?? 'login';
 
// Rotas
switch ($page) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->login($_POST['email'], $_POST['password']);
        } else {
            $auth->showLogin();
        }
        break;
 
    case 'logout':
        $auth->logout();
        break;
 
    case 'dashboard':
        AuthController::checkAuth(); // protege a rota
        $admin->dashboard();
        break;
 
    default:
        echo "Página não encontrada.";
}