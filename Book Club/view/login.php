<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Book Club</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="Style/login.css">
</head>
<body>
  <!-- Efeito de partículas -->
  <div id="particles-js"></div>

  <!-- Container principal -->
  <div class="login-container">
    <!-- Card de login -->
    <div class="login-card">
      <div class="login-logo">
        <img src="../img//logo book2.png" alt="Book Club">
        <h1>Book Club</h1>
        <p>Faça login para continuar sua jornada literária</p>
      </div>

      <?php
      session_start();
      $mensagem = $_SESSION['mensagem'] ?? '';
      $tipo = $_SESSION['tipo_mensagem'] ?? '';
      unset($_SESSION['mensagem'], $_SESSION['tipo_mensagem']);
      ?>
      
      <?php if ($mensagem): ?>
        <div class="alert alert-<?php echo $tipo === 'sucesso' ? 'success' : 'danger'; ?>">
          <?php echo $mensagem; ?>
        </div>
      <?php endif; ?>
      
      <form action="../controller/loginController.php" method="POST">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="seu@email.com" required>
        </div>

        <div class="form-group">
          <label for="password">Senha</label>
          <div class="password-wrapper">
            <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
          </div>
        </div>

        <div class="remember-me">
          <input type="checkbox" id="rememberMe">
          <label for="rememberMe">Lembrar-me</label>
        </div>

        <button type="submit" class="login-btn">
          <i class="fas fa-sign-in-alt"></i> Entrar
        </button>

        <div id="message" class="message"></div>

        <div class="login-links">
          Não tem uma conta? <a href="cadastro.php">Cadastre-se</a><br>
          <a href="recuperar senha.php">Esqueceu sua senha?</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="JavaScript/login.js"></script>
</body>
</html>