<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro | Book Club</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="Style/cadastro.css">
</head>
<body>
  <!-- Efeito de partículas -->
  <div id="particles-js"></div>

  <!-- Container principal -->
  <div class="register-container">
    <!-- Card de cadastro -->
    <div class="register-card">
      <div class="register-logo">
        <img src="../img//logo book2.png" alt="Book Club">
        <h1>Book Club</h1>
        <p>Crie sua conta e comece sua jornada literária</p>
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
      
      <form action="../controller/RegisterController.php" method="POST">
        <div class="form-group">
          <label for="fullname">Nome Completo</label>
          <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Digite seu nome completo" required>
        </div>

        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="seu@email.com" required>
        </div>

        <div class="form-group">
          <label for="password">Senha</label>
          <div class="password-wrapper">
            <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required minlength="6">
            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
          </div>
          <div class="password-strength">
            <div class="strength-meter" id="strengthMeter"></div>
          </div>
          <div class="password-strength-text" id="strengthText">Força da senha</div>
        </div>

        <div class="form-group">
          <label for="confirmPassword">Confirmar Senha</label>
          <div class="password-wrapper">
            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="••••••••" required>
            <i class="fas fa-eye toggle-password" id="toggleConfirmPassword"></i>
          </div>
        </div>

        <button type="submit" class="register-btn">
          <i class="fas fa-user-plus"></i> Criar Conta
        </button>

        <div id="message" class="message"></div>

        <div class="register-links">
          Já tem uma conta? <a href="login.php">Faça login</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="JavaScript/cadastro.js"></script>
</body>
</html>