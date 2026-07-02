<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garantia Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Style/Garantia book club.css">
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
            <li><a href="Sobre nós.php">Sobre Nós</a></li>
            <li><a href="como comprar.php">Como Comprar</a></li>
            <li><a href="Garantia book club.php" class="active">Garantia</a></li>
        </ul>
        
        <div class="nav-icons">
            <a href="carrinho.php" class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count" id="cartCount">0</span>
            </a>
        </div>
    </nav>

    <!-- Banner Hero -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Garantia Book Club</h1>
                <p>Proteção completa para suas compras com suporte especializado e processos simplificados</p>
            </div>
        </div>
    </section>

    <!-- Seção de Benefícios -->
    <section class="featured">
        <div class="container">
            <div class="section-title">
                <h2>Nossa Garantia</h2>
                <p>Conheça os benefícios exclusivos que oferecemos para sua tranquilidade</p>
            </div>
            
            <div class="card-container">
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="card-content">
                        <h3>Proteção Total</h3>
                        <p>Garantia contra defeitos de fabricação por 12 meses para todos os produtos, com suporte técnico especializado.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <div class="card-content">
                        <h3>Troca Simplificada</h3>
                        <p>Troca facilitada em até 30 dias após o recebimento do produto, sem burocracia e com processo ágil.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="card-content">
                        <h3>Suporte Prioritário</h3>
                        <p>Atendimento especializado para clientes com produtos em garantia, com resposta em até 24 horas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Processo -->
    <section class="featured" style="background-color: #f9f9f9;">
        <div class="container">
            <div class="section-title">
                <h2>Como Funciona</h2>
                <p>Entenda o processo para acionar sua garantia de forma simples e rápida</p>
            </div>
            
            <div class="process-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Registro do Produto</h3>
                        <p>Registre seu produto em até 30 dias após a compra para ativar todos os benefícios da garantia extendida.</p>
                    </div>
                </div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Acionamento da Garantia</h3>
                        <p>Entre em contato conosco pelo canal exclusivo de garantia informando o número do pedido e o problema encontrado.</p>
                    </div>
                </div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Análise Técnica</h3>
                        <p>Nossa equipe técnica fará a avaliação do produto e indicará a solução mais adequada para o seu caso.</p>
                    </div>
                </div>
                
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Solução Rápida</h3>
                        <p>Após a análise, providenciaremos a reparação, troca ou reembolso conforme o caso, sempre priorizando sua satisfação.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de FAQ -->
    <section class="featured">
        <div class="container">
            <div class="section-title">
                <h2>Dúvidas Frequentes</h2>
                <p>Encontre respostas para as perguntas mais comuns sobre nossa garantia</p>
            </div>
            
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        Quanto tempo dura a garantia?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Todos os produtos têm garantia de 12 meses contra defeitos de fabricação. Para produtos de informática e eletrônicos, a garantia é de 90 dias, conforme determina o Código de Defesa do Consumidor.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        Como aciono a garantia?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Entre em contato conosco pelo e-mail garantia@bookclub.com.br ou pelo telefone (11) 3000-1000. Você também pode abrir um chamado diretamente em sua conta no site, na seção "Meus Pedidos".
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        Preciso pagar pelo envio do produto?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Cobrimos todos os custos de envio para produtos em garantia. Forneceremos uma etiqueta pré-paga para o reenvio do produto à nossa central técnica.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        E se o produto não puder ser reparado?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Caso o produto não possa ser reparado, oferecemos a substituição por um produto equivalente ou o reembolso integral do valor pago, conforme sua preferência.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Precisa acionar sua garantia?</h3>
                <p>Nossa equipe está pronta para ajudar você a resolver qualquer problema com seu produto</p>
                
                <div class="cta-buttons">
                    <a href="contato.php" class="btn btn-primary">Fale Conosco</a>
                    <a href="Central de Ajuda.php" class="btn btn-outline">Central de Ajuda</a>
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
                
                    </ul>
                    
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

        // Função de Pesquisa
        function searchProducts() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            alert('Funcionalidade de pesquisa seria implementada aqui. Termo pesquisado: ' + query);
        }
        
        // Adiciona evento de tecla para a busca
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchProducts();
            }
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // FAQ interactivity
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                item.classList.toggle('active');
            });
        });

        // Atualizar contador ao carregar a página
        document.addEventListener('DOMContentLoaded', function() {
            updateCartCount();
            
            // Adicionar animação CSS dinamicamente
            const style = document.createElement('style');
            style.innerHTML = `
                @keyframes slideIn {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes fadeOut {
                    from { opacity: 1; }
                    to { opacity: 0; }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>
</html>