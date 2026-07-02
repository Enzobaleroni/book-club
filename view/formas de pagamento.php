<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos de Pagamento - Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Style/formas de pagamento.css">
</head>
<body>
    <!-- Navbar Moderna -->
    <nav class="navbar">
        <div class="logo">
            <img src="img//logo book2.png" alt="Book Club Logo">
            <span class="logo-text">Book Club</span>
        </div>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Pesquisar livros...">
            <button onclick="searchProducts()"><i class="fas fa-search"></i></button>
        </div>
        <ul class="nav-links">
            <li><a href="login.php">Login</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
        <div class="nav-icons">
            <a href="carrinho.php" class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count" id="cartCount">0</span>
            </a>
        </div>
    </nav>

    <!-- Seção de Métodos de Pagamento -->
    <section class="payment-section">
        <div class="container">
            <div class="payment-header">
                <h1>Métodos de Pagamento</h1>
                <p>Escolha a forma mais segura e conveniente para finalizar sua compra.</p>
            </div>

            <!-- Métodos de Pagamento -->
            <div class="payment-methods">
                <!-- Cartão de Crédito -->
                <div class="method-card">
                    <div class="method-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h3>Cartão de Crédito</h3>
                    <p>Pague em até 12x sem juros ou à vista com segurança. Aceitamos Visa, Mastercard, Elo, American Express e mais.</p>
                    <div class="method-details">
                        <span class="method-badge">Visa</span>
                        <span class="method-badge">Mastercard</span>
                        <span class="method-badge">Elo</span>
                        <span class="method-badge">Amex</span>
                    </div>
                </div>

                <!-- PIX -->
                <div class="method-card">
                    <div class="method-icon">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <h3>Pix - Pagamento Instantâneo</h3>
                    <p>Receba o código QR na hora. Pagamento rápido, direto e sem taxas. Ideal para compras à vista.</p>
                    <div class="method-details">
                        <span class="method-badge">Instantâneo</span>
                        <span class="method-badge">Sem juros</span>
                        <span class="method-badge">24/7</span>
                    </div>
                </div>

                <!-- Boleto Bancário -->
                <div class="method-card">
                    <div class="method-icon">
                        <i class="fas fa-barcode"></i>
                    </div>
                    <h3>Boleto Bancário</h3>
                    <p>Imprima ou pague pelo internet banking em até 3 dias úteis após o pedido. Ideal para quem prefere pagar à vista.</p>
                    <div class="method-details">
                        <span class="method-badge">À vista</span>
                        <span class="method-badge">Fácil</span>
                        <span class="method-badge">Acesso universal</span>
                    </div>
                </div>

                <!-- Débito Online -->
                <div class="method-card">
                    <div class="method-icon">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <h3>Débito Online</h3>
                    <p>Pague diretamente do seu banco com segurança. Suporte a principais instituições financeiras.</p>
                    <div class="method-details">
                        <span class="method-badge">Itaú</span>
                        <span class="method-badge">Bradesco</span>
                        <span class="method-badge">Banco do Brasil</span>
                        <span class="method-badge">Caixa</span>
                    </div>
                </div>
            </div>

            <!-- Segurança -->
            <div class="secure-info">
                <h3>Seus dados estão seguros conosco</h3>
                <p>Utilizamos criptografia de ponta a ponta e não armazenamos dados sensíveis. Sua compra é 100% protegida.</p>
                <div class="secure-icons">
                    <i class="fas fa-shield-alt"></i>
                    <i class="fas fa-lock"></i>
                    <i class="fas fa-credit-card"></i>
                    <i class="fas fa-user-shield"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Rodapé Moderno -->
    <footer class="footer">
        <div class="footer-wave"></div>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h4>ATENDIMENTO</h4>
                    <ul class="footer-links">
                        <li><a href="Central de Ajuda.php">Central de Ajuda</a></li>
                        <li><a href="formas de pagamento.php">Métodos de Pagamento</a></li>
                        <li><a href="Garantia book club.php">Garantia Book Club</a></li>
                        <li><a href="Devolução e Reembolso.php">Devolução e Reembolso</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>SOBRE NÓS</h4>
                    <ul class="footer-links">
                        <li><a href="Sobre nós.php">Sobre Nós</a></li>
                        <li><a href="Politicas de privacidade.php">Política de Privacidade</a></li>
                        <li><a href="Ofertas.php">Ofertas</a></li>
                        <li><a href="Book club BLOG.php">Book Club BLOG</a></li>
                        <li><a href="Imprensa.php">Imprensa</a></li>
                    </ul>
                </div>
                

                    
                    <div class="footer-social">
                        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 Book Club. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Atualizar contador do carrinho
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cartCount').textContent = totalItems;
        }

        // Função de busca
        function searchProducts() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            alert("Busca por: " + query + " (Funcionalidade no produto principal)");
        }

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Atualizar contador ao carregar
        document.addEventListener('DOMContentLoaded', updateCartCount);
    </script>
</body>
</html>