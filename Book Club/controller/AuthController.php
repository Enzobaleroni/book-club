    <?php
session_start();
require_once '../database/db.php';

function authenticateUser($email, $password) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT id, nome, email, senha FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['role'] = 'user';
            return true;
        }
    }
    return false;
}

function authenticateAdmin($email, $password) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT id, nome, email, senha FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['senha'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['nome'];
            $_SESSION['admin_email'] = $admin['email'];
            $_SESSION['role'] = 'admin';
            return true;
        }
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $userType = $_POST['user_type'] ?? 'user';

    if ($userType === 'admin') {
        if (authenticateAdmin($email, $password)) {
            header("Location: admin/dashboard.php");
        } else {
            $_SESSION['error'] = "Email ou senha de administrador inválidos.";
            header("Location: login.php?user_type=admin");
        }
    } else {
        if (authenticateUser($email, $password)) {
            header("Location: user/dashboard.php");
        } else {
            $_SESSION['error'] = "Email ou senha de usuário inválidos.";
            header("Location: login.php?user_type=user");
        }
    }
    exit;
}

// Redirect if accessed directly
header("Location: ../index.php");
exit;