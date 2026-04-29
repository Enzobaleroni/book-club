<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas Especiais - Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Style/Book Club.css"> <!-- Reutilizando o mesmo CSS -->
    <style>
        .offer-badge {
            background: linear-gradient(90deg,rgb(107, 129, 255),rgb(39, 36, 238));
        }
        .section-title h2 span {
            color: var(--secondary);
        }
    </style>
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

    <!-- Banner Hero -->
    <section class="hero" style="background: linear-gradient(135deg,rgb(3, 15, 185),rgb(66, 36, 238));">
        <div class="container">
            <div class="hero-content">
                <h1>Ofertas Imperdíveis</h1>
                <p>Livros com descontos especiais por tempo limitado. Aproveite antes que acabe!</p>
                <a href="#offers" class="hero-btn">Ver Ofertas</a>
            </div>
        </div>
    </section>

    <!-- Seção de Ofertas -->
    <section class="featured" id="offers">
        <div class="container">
            <div class="section-title">
                <h2>Ofertas <span>Especiais</span></h2>
                <p>Descontos exclusivos para leitores ávidos como você</p>
            </div>
            
            <div class="product-gallery" id="productGallery">
                <!-- Oferta 1 -->
                <div class="product-item" data-name="Pai Rico, Pai Pobre" data-price="39.90">
                    <span class="product-badge offer-badge">-40%</span>
                    <div class="product-image">
                        <a href="oferta1.php">
                            <img src="img//pai-rico-pai-pobre.jpg" alt="Pai Rico, Pai Pobre">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Finanças</span>
                        <h3 class="product-title"><a href="oferta1.php">Pai Rico, Pai Pobre</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(420)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 39,90</span>
                            <span class="old-price">R$ 66,50</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Oferta 2 -->
                <div class="product-item" data-name="O Monge e o Executivo" data-price="24.90">
                    <span class="product-badge offer-badge">-50%</span>
                    <div class="product-image">
                        <a href="oferta2.php">
                            <img src="img//monge-executivo.jpg" alt="O Monge e o Executivo">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Liderança</span>
                        <h3 class="product-title"><a href="oferta2.php">O Monge e o Executivo</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(198)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 24,90</span>
                            <span class="old-price">R$ 49,90</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Oferta 3 -->
                <div class="product-item" data-name="Sapiens" data-price="44.90">
                    <span class="product-badge offer-badge">-35%</span>
                    <div class="product-image">
                        <a href="oferta3.php">
                            <img src="img//sapiens.jpg" alt="Sapiens">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">História</span>
                        <h3 class="product-title"><a href="oferta3.php">Sapiens</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(890)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 44,90</span>
                            <span class="old-price">R$ 69,00</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Oferta 4 -->
                <div class="product-item" data-name="O Poder da Ação" data-price="29.90">
                    <span class="product-badge offer-badge">Flash Sale</span>
                    <div class="product-image">
                        <a href="oferta4.php">
                            <img src="img//poder-da-acao.jpg" alt="O Poder da Ação">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Autoajuda</span>
                        <h3 class="product-title"><a href="oferta4.php">O Poder da Ação</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(312)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 29,90</span>
                            <span class="old-price">R$ 49,90</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Oferta 5 -->
                <div class="product-item" data-name="Essencialismo" data-price="37.90">
                    <span class="product-badge offer-badge">-30%</span>
                    <div class="product-image">
                        <a href="oferta5.php">
                            <img src="img//essencialismo.jpg" alt="Essencialismo">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Produtividade</span>
                        <h3 class="product-title"><a href="oferta5.php">Essencialismo</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(205)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 37,90</span>
                            <span class="old-price">R$ 54,90</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
                            <i class="fas fa-shopping-cart"></i> Adicionar
                        </button>
                    </div>
                </div>
                
                <!-- Oferta 6 -->
                <div class="product-item" data-name="A Revolução dos Bichos" data-price="19.90">
                    <span class="product-badge offer-badge">Clássico em Promo</span>
                    <div class="product-image">
                        <a href="oferta6.php">
                            <img src="img//revolucao-dos-bichos.jpg" alt="A Revolução dos Bichos">
                        </a>
                        <div class="product-actions">
                            <button class="product-action-btn" title="Favoritar"><i class="far fa-heart"></i></button>
                            <button class="product-action-btn" title="Visualizar rápido"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">Ficção Política</span>
                        <h3 class="product-title"><a href="oferta6.php">A Revolução dos Bichos</a></h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(530)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">R$ 19,90</span>
                            <span class="old-price">R$ 34,90</span>
                        </div>
                        <button class="add-to-cart" onclick="addToCart(this)">
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
                <h3>Não perca nenhuma oferta!</h3>
                <p>Assine e receba alertas de promoções exclusivas e flash sales diretamente no seu e-mail.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Seu e-mail para ofertas" required>
                    <button type="submit">Quero receber!</button>
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

    <script>
        // Atualizar contador do carrinho
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cartCount').textContent = totalItems;
        }

        // Adicionar ao carrinho
        function addToCart(button) {
            const productElement = button.closest('.product-item');
            const name = productElement.getAttribute('data-name');
            const price = parseFloat(productElement.getAttribute('data-price'));
            
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProduct = cart.find(item => item.name === name);
            
            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push({ name, price, quantity: 1 });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            
            // Notificação visual
            const notification = document.createElement('div');
            notification.style.position = 'fixed';
            notification.style.bottom = '20px';
            notification.style.right = '20px';
            notification.style.backgroundColor = '#4BB543';
            notification.style.color = 'white';
            notification.style.padding = '15px 25px';
            notification.style.borderRadius = '5px';
            notification.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
            notification.style.zIndex = '1000';
            notification.style.animation = 'slideIn 0.5s, fadeOut 0.5s 2.5s forwards';
            notification.innerHTML = `<i class="fas fa-check-circle"></i> ${name} foi adicionado ao carrinho!`;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Função de Pesquisa
        function searchProducts() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const products = document.querySelectorAll('.product-item');
            
            products.forEach(product => {
                const productName = product.querySelector('.product-title').innerText.toLowerCase();
                if (productName.includes(query)) {
                    product.classList.remove('hidden');
                } else {
                    product.classList.add('hidden');
                }
            });
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
            .offer-badge {
                background: linear-gradient(90deg,rgb(14, 23, 148),rgb(56, 36, 238)) !important;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>