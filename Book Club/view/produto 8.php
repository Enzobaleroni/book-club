<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Os 7 Hábitos das Pessoas Altamente Eficazes | Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Style/Produtos.css">
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

    <!-- Breadcrumb -->
    <div class="container">
        <div class="breadcrumb">
            <a href="Book Club.php">Home</a>
            <span>/</span>
            <a href="#">Desenvolvimento Pessoal</a>
            <span>/</span>
            <a href="#">Autoajuda</a>
            <span>/</span>
            <span>Os 7 Hábitos das Pessoas Altamente Eficazes</span>
        </div>
    </div>

    <!-- Página de Produto -->
    <section class="product-page">
        <div class="container">
            <div class="product-container">
                <!-- Galeria de Imagens -->
                <div class="product-gallery">
                    <div class="thumbnail-list">
                        <div class="thumbnail active" onclick="changeImage('7-habitos.jpg')">
                            <img src="img//os 7.webp" alt="Capa do Livro">
                        </div>
                        
                    </div>
                    
                    <div class="main-image">
                        <img src="img//os 7.webp" alt="Os 7 Hábitos das Pessoas Altamente Eficazes" id="mainProductImage">
                    </div>
                </div>
                
                <!-- Informações do Produto -->
                <div class="product-info">
                    <h1 class="product-title">Os 7 Hábitos das Pessoas Altamente Eficazes</h1>
                    
                    <div class="product-meta">
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="product-review-count">(2.478 avaliações)</span>
                        </div>
                        <span class="product-brand">Por Stephen R. Covey</span>
                    </div>
                    
                    <div class="product-price-container">
                        <span class="current-price">R$ 55,00</span>
                        <span class="old-price">R$ 69,90</span>
                        <span class="discount-badge">21% off</span>
                        <div class="product-availability">
                            <i class="fas fa-check-circle"></i> Disponível em estoque
                        </div>
                    </div>
                    
                    <div class="product-description">
                        <p>Um dos livros mais influentes do século XX, "Os 7 Hábitos das Pessoas Altamente Eficazes" apresenta princípios poderosos que ajudam indivíduos a alcançar uma vida verdadeiramente eficaz e significativa, tanto no âmbito pessoal quanto profissional.</p>
                    </div>
                    
                    <div class="product-actions">
                        <div class="quantity-selector">
                            <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                            <input type="number" class="quantity-input" value="1" min="1" id="productQuantity">
                            <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                        </div>
                        
                        <button class="add-to-cart" onclick="addToCart()">
                            <i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho
                        </button>
                        
                        <button class="wishlist-btn" onclick="addToWishlist()">
                            <i class="far fa-heart"></i> Adicionar à Lista de Desejos
                        </button>
                    </div>
                    
                    <div class="product-delivery">
                        <div class="delivery-option">
                            <i class="fas fa-truck"></i>
                            <div class="delivery-text">
                                <strong>Entrega padrão</strong>
                                <span>Receba em 3 a 5 dias úteis</span>
                            </div>
                        </div>
                        
                        <div class="delivery-option">
                            <i class="fas fa-store"></i>
                            <div class="delivery-text">
                                <strong>Retirada em loja</strong>
                                <span>Disponível em 2 horas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Abas de Informações -->
            <div class="product-tabs">
                <div class="tabs-header">
                    <button class="tab-btn active" onclick="openTab('description')">Descrição</button>
                    <button class="tab-btn" onclick="openTab('details')">Detalhes</button>
                    <button class="tab-btn" onclick="openTab('reviews')">Avaliações</button>
                    <button class="tab-btn" onclick="openTab('shipping')">Frete & Devolução</button>
                </div>
                
                <div id="description" class="tab-content active">
                    <h3>Sobre este livro</h3>
                    <p>"Os 7 Hábitos das Pessoas Altamente Eficazes" é um clássico do desenvolvimento pessoal que já vendeu mais de 25 milhões de cópias em todo o mundo. Stephen R. Covey apresenta uma abordagem holística e integrada para resolver problemas pessoais e profissionais.</p>
                    
                    <p>O livro aborda os sete hábitos fundamentais:</p>
                    <ul>
                        <li>Seja Proativo: Assumir a responsabilidade por sua própria vida</li>
                        <li>Comece com o Objetivo em Mente: Definir seus valores e objetivos de vida</li>
                        <li>Primeiro o Mais Importante: Priorizar e executar suas principais metas</li>
                        <li>Pense em Ganha-Ganha: Buscar benefícios mútuos em todas as interações</li>
                        <li>Procure Primeiro Compreender, Depois Ser Compreendido: Comunicar-se com empatia</li>
                        <li>Crie Sinergia: Trabalhar em equipe para alcançar resultados melhores</li>
                        <li>Afire o Serra: Renovar-se continuamente nos quatro aspectos da vida (físico, mental, espiritual e social/emocional)</li>
                    </ul>
                    
                    <p>Esta edição inclui insights adicionais que Covey obteve desde a primeira publicação do livro, respondendo a perguntas frequentes e mostrando como os 7 hábitos se aplicam às complexidades da vida e dos negócios atuais.</p>
                </div>
                
                <div id="details" class="tab-content">
                    <h3>Detalhes do produto</h3>
                    <ul>
                        <li><strong>Autor:</strong> Stephen R. Covey</li>
                        <li><strong>Editora:</strong> Best Seller</li>
                        <li><strong>Idioma:</strong> Português</li>
                        <li><strong>Encadernação:</strong> Capa dura</li>
                        <li><strong>Número de páginas:</strong> 480</li>
                        <li><strong>ISBN-10:</strong> 8576848876</li>
                        <li><strong>ISBN-13:</strong> 978-8576848875</li>
                        <li><strong>Dimensões:</strong> 23.6 x 16.4 x 3.2 cm</li>
                        <li><strong>Peso:</strong> 780g</li>
                        <li><strong>Data de publicação:</strong> 1 de janeiro de 2013</li>
                        <li><strong>Edição:</strong> Edição especial de 25º aniversário</li>
                    </ul>
                </div>
                
                <div id="reviews" class="tab-content">
                    <h3>Avaliações de clientes</h3>
                    <div class="review-summary">
                        <div class="overall-rating">
                            <span class="rating-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            <span class="average-rating">4.7 de 5</span>
                            <span class="total-reviews">(2.478 avaliações)</span>
                        </div>
                        
                        <div class="rating-bars">
                            <div class="rating-bar">
                                <span>5 estrelas</span>
                                <div class="bar-container">
                                    <div class="bar" style="width: 72%;"></div>
                                </div>
                                <span>72%</span>
                            </div>
                            <div class="rating-bar">
                                <span>4 estrelas</span>
                                <div class="bar-container">
                                    <div class="bar" style="width: 18%;"></div>
                                </div>
                                <span>18%</span>
                            </div>
                            <div class="rating-bar">
                                <span>3 estrelas</span>
                                <div class="bar-container">
                                    <div class="bar" style="width: 6%;"></div>
                                </div>
                                <span>6%</span>
                            </div>
                            <div class="rating-bar">
                                <span>2 estrelas</span>
                                <div class="bar-container">
                                    <div class="bar" style="width: 2%;"></div>
                                </div>
                                <span>2%</span>
                            </div>
                            <div class="rating-bar">
                                <span>1 estrela</span>
                                <div class="bar-container">
                                    <div class="bar" style="width: 2%;"></div>
                                </div>
                                <span>2%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="customer-reviews">
                        <div class="review">
                            <div class="review-header">
                                <span class="review-author">Mariana S.</span>
                                <span class="review-date">22/08/2023</span>
                                <span class="review-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                            <div class="review-title">Transformador!</div>
                            <div class="review-content">
                                <p>Este livro mudou completamente minha perspectiva sobre produtividade e relacionamentos. Os princípios são atemporais e aplicáveis a todas as áreas da vida. Já recomendei para todos os meus amigos e colegas de trabalho.</p>
                            </div>
                        </div>
                        
                        <div class="review">
                            <div class="review-header">
                                <span class="review-author">Ricardo L.</span>
                                <span class="review-date">10/07/2023</span>
                                <span class="review-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </span>
                            </div>
                            <div class="review-title">Excelente, mas denso</div>
                            <div class="review-content">
                                <p>O conteúdo é excelente e realmente transformador, mas a leitura é bastante densa em alguns momentos. Requer tempo para absorver e aplicar os conceitos. Vale cada minuto investido, mas não espere uma leitura rápida e superficial.</p>
                            </div>
                        </div>
                    </div>
                    
                    <button class="see-all-reviews">Ver todas as avaliações</button>
                </div>
                
                <div id="shipping" class="tab-content">
                    <h3>Opções de frete e devolução</h3>
                    <h4>Frete</h4>
                    <p>Oferecemos várias opções de envio para atender às suas necessidades. O prazo de entrega começa a contar a partir da confirmação do pagamento.</p>
                    
                    <ul>
                        <li><strong>Entrega Padrão:</strong> 3-5 dias úteis - R$ 9,90</li>
                        <li><strong>Entrega Expressa:</strong> 1-2 dias úteis - R$ 19,90</li>
                        <li><strong>Retirada em Loja:</strong> Disponível em 2 horas - Grátis</li>
                    </ul>
                    
                    <h4>Devolução</h4>
                    <p>Se você não estiver satisfeito com sua compra, pode devolver o produto em até 7 dias após o recebimento para obter um reembolso total. O produto deve estar em perfeitas condições, com todos os acessórios e embalagem originais.</p>
                    
                    <p>Para iniciar uma devolução, entre em contato com nosso atendimento ao cliente ou solicite a devolução diretamente em sua conta no site.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Produtos Relacionados -->
    <section class="related-products">
        <div class="container">
            <div class="section-title">
                <h2>Quem comprou este livro também se interessou por</h2>
                <p>Descubra outros títulos que podem te interessar</p>
            </div>
            
            <div class="product-grid">
                <!-- Produto 1 -->
                <div class="product-card">
                    <div class="product-card-image">
                        <a href="#">
                            <img src="img//image.jpg" alt="O 8º Hábito">
                        </a>
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">O 8º Hábito: Da Eficácia à Grandeza</h3>
                        <div class="product-card-price">
                            <span class="product-card-current-price">R$ 49,90</span>
                            <span class="product-card-old-price">R$ 59,90</span>
                        </div>
                        <button class="product-card-btn" onclick="addToCartRelated('O 8º Hábito: Da Eficácia à Grandeza', 49.90)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 2 -->
                <div class="product-card">
                    <div class="product-card-image">
                        <a href="#">
                            <img src="img//O-Poder-Do-Agora.jpg" alt="O Poder do Agora">
                        </a>
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">O Poder do Agora</h3>
                        <div class="product-card-price">
                            <span class="product-card-current-price">R$ 39,90</span>
                        </div>
                        <button class="product-card-btn" onclick="addToCartRelated('O Poder do Agora', 39.90)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 3 -->
                <div class="product-card">
                    <div class="product-card-image">
                        <a href="#">
                            <img src="img//habitos.jpg" alt="Hábitos Atômicos">
                        </a>
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">Hábitos Atômicos</h3>
                        <div class="product-card-price">
                            <span class="product-card-current-price">R$ 44,90</span>
                        </div>
                        <button class="product-card-btn" onclick="addToCartRelated('Hábitos Atômicos', 44.90)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Produto 4 -->
                <div class="product-card">
                    <div class="product-card-image">
                        <a href="#">
                            <img src="img//mindset.jpg" alt="Mindset">
                        </a>
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">Mindset: A Nova Psicologia do Sucesso</h3>
                        <div class="product-card-price">
                            <span class="product-card-current-price">R$ 42,50</span>
                            <span class="product-card-old-price">R$ 49,90</span>
                        </div>
                        <button class="product-card-btn" onclick="addToCartRelated('Mindset: A Nova Psicologia do Sucesso', 42.50)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h3>Assine nossa newsletter</h3>
                <p>Receba as últimas novidades, promoções e dicas de leitura diretamente no seu e-mail.</p>
                <form class="newsletter-form" onsubmit="subscribeNewsletter(event)">
                    <input type="email" placeholder="Seu melhor e-mail" required>
                    <button type="submit">Assinar</button>
                </form>
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

    <script>        // Atualizar contador do carrinho
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cartCount').textContent = totalItems;
        }

        // Adicionar ao carrinho
        function addToCart() {
            const name = "Os 7 Hábitos das Pessoas Altamente Eficazes";
            const price = 55.00;
            const quantity = parseInt(document.getElementById('productQuantity').value);
            
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProduct = cart.find(item => item.name === name);
            
            if (existingProduct) {
                existingProduct.quantity += quantity;
            } else {
                cart.push({ name, price, quantity });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            
            showNotification(`${name} foi adicionado ao carrinho!`, 'success');
        }

        // Adicionar produto relacionado ao carrinho
        function addToCartRelated(name, price) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProduct = cart.find(item => item.name === name);
            
            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push({ name, price, quantity: 1 });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            
            showNotification(`${name} foi adicionado ao carrinho!`, 'success');
        }

        // Adicionar à lista de desejos
        function addToWishlist() {
            const name = "Os 7 Hábitos das Pessoas Altamente Eficazes";
            const price = 55.00;
            
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            const existingProduct = wishlist.find(item => item.name === name);
            
            if (!existingProduct) {
                wishlist.push({ name, price });
                localStorage.setItem('wishlist', JSON.stringify(wishlist));
                showNotification(`${name} foi adicionado à sua lista de desejos!`, 'success');
            } else {
                showNotification('Este produto já está na sua lista de desejos!', 'info');
            }
        }

        // Mostrar notificação
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.style.position = 'fixed';
            notification.style.bottom = '20px';
            notification.style.right = '20px';
            notification.style.backgroundColor = type === 'success' ? '#4BB543' : '#2196F3';
            notification.style.color = 'white';
            notification.style.padding = '15px 25px';
            notification.style.borderRadius = '5px';
            notification.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
            notification.style.zIndex = '1000';
            notification.style.animation = 'slideIn 0.5s, fadeOut 0.5s 2.5s forwards';
            notification.innerHTML = `<i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i> ${message}`;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Alterar quantidade
        function increaseQuantity() {
            const quantityInput = document.getElementById('productQuantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('productQuantity');
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }

        // Alterar imagem principal
        function changeImage(src) {
            document.getElementById('mainProductImage').src = src;
            
            // Atualizar thumbnails ativas
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            event.currentTarget.classList.add('active');
        }

        // Abas de informações
        function openTab(tabId) {
            // Esconder todos os conteúdos
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Desativar todos os botões
            const tabButtons = document.querySelectorAll('.tab-btn');
            tabButtons.forEach(button => button.classList.remove('active'));
            
            // Mostrar conteúdo selecionado
            document.getElementById(tabId).classList.add('active');
            
            // Ativar botão selecionado
            event.currentTarget.classList.add('active');
        }

        // Assinar newsletter
        function subscribeNewsletter(event) {
            event.preventDefault();
            const email = event.target.querySelector('input').value;
            
            // Simular armazenamento (em um caso real, seria uma chamada AJAX)
            let subscribers = JSON.parse(localStorage.getItem('newsletterSubscribers')) || [];
            if (!subscribers.includes(email)) {
                subscribers.push(email);
                localStorage.setItem('newsletterSubscribers', JSON.stringify(subscribers));
                showNotification('Obrigado por assinar nossa newsletter!', 'success');
            } else {
                showNotification('Este e-mail já está cadastrado!', 'info');
            }
            
            event.target.reset();
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

        // Atualizar contador ao carregar a página
        document.addEventListener('DOMContentLoaded', updateCartCount);

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
        </script>
</body>
</html>