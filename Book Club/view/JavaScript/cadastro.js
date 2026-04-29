// Inicializa partículas
particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 80,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        }
      },
      "opacity": {
        "value": 0.3,
        "random": true,
        "anim": {
          "enable": true,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": {
          "enable": true,
          "speed": 2,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.2,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 1,
        "direction": "none",
        "random": true,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": true,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "grab"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 140,
          "line_linked": {
            "opacity": 0.5
          }
        },
        "push": {
          "particles_nb": 4
        }
      }
    },
    "retina_detect": true
  });
  
  // Mostrar/Ocultar senha
  const togglePassword = document.getElementById('togglePassword');
  const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirmPassword');
  
  togglePassword.addEventListener('click', function() {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
  });
  
  toggleConfirmPassword.addEventListener('click', function() {
    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPassword.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
  });
  
  // Verificação de força da senha
  password.addEventListener('input', function() {
    const strengthMeter = document.getElementById('strengthMeter');
    const strengthText = document.getElementById('strengthText');
    const strength = checkPasswordStrength(this.value);
    
    // Remove todas as classes de força
    strengthMeter.className = 'strength-meter';
    
    // Adiciona a classe apropriada
    if (strength === 0) {
      strengthText.textContent = 'Muito fraca';
    } else if (strength === 1) {
      strengthText.textContent = 'Fraca';
      strengthMeter.classList.add('strength-weak');
    } else if (strength === 2) {
      strengthText.textContent = 'Moderada';
      strengthMeter.classList.add('strength-medium');
    } else if (strength === 3) {
      strengthText.textContent = 'Forte';
      strengthMeter.classList.add('strength-strong');
    } else {
      strengthText.textContent = 'Muito forte';
      strengthMeter.classList.add('strength-very-strong');
    }
  });
  
  function checkPasswordStrength(password) {
    let strength = 0;
    
    // Verifica o comprimento
    if (password.length >= 8) strength++;
    if (password.length >= 12) strength++;
    
    // Verifica caracteres diversos
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    
    // Limita a força máxima a 4
    return Math.min(strength, 4);
  }
  
  // Validação do formulário
  const registerForm = document.getElementById('registerForm');
  const messageDiv = document.getElementById('message');
  
  registerForm.addEventListener('submit', (event) => {
    event.preventDefault();
  
    const fullname = document.getElementById('fullname').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirmPassword').value.trim();
  
    // Validações básicas
    if (!fullname || !email || !password || !confirmPassword) {
      showMessage('Todos os campos são obrigatórios.', 'error');
      return;
    }
  
    if (password !== confirmPassword) {
      showMessage('As senhas não coincidem.', 'error');
      return;
    }
  
    if (password.length < 8) {
      showMessage('A senha deve ter pelo menos 8 caracteres.', 'error');
      return;
    }
  
    // Verifica se o email já está cadastrado
    const existingUser = localStorage.getItem('user_' + email);
    if (existingUser) {
      showMessage('Este e-mail já está cadastrado.', 'error');
      return;
    }
  
    // Salva os dados do usuário
    const userData = {
      fullname,
      email,
      password
    };
  
    localStorage.setItem('user_' + email, JSON.stringify(userData));
    localStorage.setItem('userData', JSON.stringify(userData));
  
    showMessage('Cadastro realizado com sucesso! Redirecionando...', 'success');
  
    // Redireciona após 2 segundos
    setTimeout(() => {
      window.location.href = 'login.php';
    }, 2000);
  });
  
  function showMessage(text, type) {
    messageDiv.textContent = text;
    messageDiv.className = 'message';
    messageDiv.classList.add(`${type}-message`);
    messageDiv.style.display = 'block';
  
    // Esconde mensagem de erro após 5 segundos
    if (type === 'error') {
      setTimeout(() => {
        messageDiv.style.display = 'none';
      }, 5000);
    }
  }