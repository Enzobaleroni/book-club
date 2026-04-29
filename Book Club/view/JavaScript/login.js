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
  const password = document.getElementById('password');
  
  togglePassword.addEventListener('click', function () {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
  });
  
  // Validação do formulário
  const loginForm = document.getElementById('loginForm');
  const messageDiv = document.getElementById('message');
  const rememberMe = document.getElementById('rememberMe');
  
  // Verifica se há credenciais salvas
  if (localStorage.getItem('rememberMe') === 'true') {
    const savedEmail = localStorage.getItem('savedEmail');
    const savedPassword = localStorage.getItem('savedPassword');
    
    if (savedEmail && savedPassword) {
      document.getElementById('email').value = savedEmail;
      document.getElementById('password').value = savedPassword;
      rememberMe.checked = true;
    }
  }
  
  loginForm.addEventListener('submit', (event) => {
    event.preventDefault();
  
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const remember = rememberMe.checked;
  
    // Validações básicas
    if (!email || !password) {
      showMessage('Todos os campos são obrigatórios.', 'error');
      return;
    }
  
    // Verifica se o usuário existe
    const userData = localStorage.getItem('user_' + email);
    
    if (!userData) {
      showMessage('E-mail não cadastrado.', 'error');
      return;
    }
  
    const user = JSON.parse(userData);
  
    // Verifica a senha
    if (user.password !== password) {
      showMessage('Senha incorreta.', 'error');
      return;
    }
  
    // Salva as credenciais se "Lembrar-me" estiver marcado
    if (remember) {
      localStorage.setItem('rememberMe', 'true');
      localStorage.setItem('savedEmail', email);
      localStorage.setItem('savedPassword', password);
    } else {
      localStorage.removeItem('rememberMe');
      localStorage.removeItem('savedEmail');
      localStorage.removeItem('savedPassword');
    }
  
    // Salva o usuário como logado
    localStorage.setItem('currentUser', JSON.stringify(user));
  
    showMessage('Login realizado com sucesso! Redirecionando...', 'success');
  
    // Redireciona após 2 segundos
    setTimeout(() => {
      window.location.href = 'Book Club.php';
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