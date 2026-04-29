<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolução e Reembolso - Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Style/devoluçao e reembolso.css">
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
            <li><a href="Garantia book club.php">Garantia</a></li>
            <li><a href="Devolução e Reembolso.php" class="active">Devolução</a></li>
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
                <h1>Devolução e Reembolso</h1>
                <p>Processo simplificado para devoluções e reembolsos com total transparência</p>
            </div>
        </div>
    </section>

    <!-- Seção de Política -->
    <section class="featured">
        <div class="container">
            <div class="section-title">
                <h2>Política de Devolução</h2>
                <p>Conheça nossa política para devoluções e reembolsos</p>
            </div>
            
            <div class="card-container">
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="card-content">
                        <h3>Prazo de 30 Dias</h3>
                        <p>Você tem até 30 dias após o recebimento para solicitar a devolução do produto, desde que esteja em perfeito estado.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <div class="card-content">
                        <h3>Produto intacto</h3>
                        <p>O produto deve estar na embalagem original, sem danos, com todos os acessórios e manuais.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="card-content">
                        <h3>Reembolso Garantido</h3>
                        <p>Após a aprovação da devolução, seu reembolso será processado em até 5 dias úteis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Processo -->
    <section class="featured" style="background-color: #f9f9f9;">
        <div class="container">
            <div class="section-title">
                <h2>Como Solicitar Devolução</h2>
                <p>Siga estes passos simples para solicitar sua devolução</p>
            </div>
            
            <div class="process-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Acesso à Área do Cliente</h3>
                        <p>Faça login em sua conta no site e acesse a seção "Meus Pedidos".</p>
                    </div>
                </div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Solicitação de Devolução</h3>
                        <p>Selecione o pedido e o produto que deseja devolver e preencha o formulário de solicitação.</p>
                    </div>
                </div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Envio do Produto</h3>
                        <p>Após a aprovação, você receberá um código de postagem para enviar o produto sem custos.</p>
                    </div>
                </div>
                
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Reembolso</h3>
                        <p>Após a conferência do produto, seu reembolso será processado conforme a forma de pagamento original.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabela de Prazos -->
    <section class="featured">
        <div class="container">
            <div class="section-title">
                <h2>Prazos de Reembolso</h2>
                <p>Confira os prazos para recebimento conforme a forma de pagamento</p>
            </div>
            
            <div class="table-container">
                <table class="refund-table">
                    <thead>
                        <tr>
                            <th>Forma de Pagamento</th>
                            <th>Prazo de Reembolso</th>
                            <th>Observações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cartão de Crédito</td>
                            <td>Até 2 faturas</td>
                            <td>O valor é estornado na fatura atual ou na seguinte</td>
                        </tr>
                        <tr>
                            <td>Boleto Bancário</td>
                            <td>5 a 10 dias úteis</td>
                            <td>Transferência para conta corrente ou poupança</td>
                        </tr>
                        <tr>
                            <td>PIX</td>
                            <td>Até 48 horas</td>
                            <td>Transferência para mesma chave PIX utilizada</td>
                        </tr>
                        <tr>
                            <td>Cartão de Débito</td>
                            <td>3 a 5 dias úteis</td>
                            <td>Estorno na mesma conta corrente</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Seção de FAQ -->
    <section class="featured" style="background-color: #f9f9f9;">
        <div class="container">
            <div class="section-title">
                <h2>Dúvidas Frequentes</h2>
                <p>Respostas para as perguntas mais comuns sobre devoluções</p>
            </div>
            
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        Preciso pagar pelo frete de devolução?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Não, para devoluções dentro do prazo e que estejam de acordo com nossa política, fornecemos etiqueta de postagem pré-paga para que você não tenha custos com o envio.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        E se o produto estiver danificado?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Produtos com avaria devem ser reportados em até 7 dias após o recebimento. Nesses casos, além do reembolso ou troca, arcamos com todos os custos de logística.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        Posso trocar um produto em vez de devolver?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Sim, você pode optar pela troca em vez do reembolso. O processo é similar e o prazo para solicitação é o mesmo de 30 dias.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        Como acompanho o status da minha devolução?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Você pode acompanhar o status na área "Minhas Devoluções" em sua conta. Também enviaremos atualizações por e-mail em cada etapa do processo.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Precisa de ajuda com uma devolução?</h3>
                <p>Nossa equipe de atendimento está pronta para ajudar você</p>
                
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
                        <li><a href="Programa de afiliados.php">Programa de Afiliados</a></li>
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