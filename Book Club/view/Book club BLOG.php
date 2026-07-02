<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Club Blog — Artigos, Dicas e Resenhas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Style/Book Club.css">
    <style>
        .blog-hero {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
        }

        .blog-post {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            margin-bottom: 40px;
        }

        .blog-post:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .post-image {
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .blog-post:hover .post-image img {
            transform: scale(1.05);
        }

        .post-category {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--secondary);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }

        .post-info {
            padding: 25px;
        }

        .post-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .post-title a {
            color: var(--dark);
            transition: var(--transition);
        }

        .post-title a:hover {
            color: var(--primary);
        }

        .post-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .post-excerpt {
            color: var(--dark);
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .read-more {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .read-more:hover {
            gap: 12px;
            transform: translateX(5px);
        }

        .sidebar {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 40px;
        }

        .sidebar h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary);
        }

        .popular-post {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .popular-post:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .popular-post img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }

        .popular-post-content h4 {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .popular-post-content h4 a {
            color: var(--dark);
            transition: var(--transition);
        }

        .popular-post-content h4 a:hover {
            color: var(--primary);
        }

        .popular-post-content .post-date {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .tag-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .tag {
            padding: 6px 14px;
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary);
            border-radius: 20px;
            font-size: 0.9rem;
            transition: var(--transition);
            text-decoration: none;
        }

        .tag:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .blog-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
        }

        @media (max-width: 992px) {
            .blog-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .popular-post {
                flex-direction: column;
            }
            .popular-post img {
                width: 100%;
                height: 150px;
            }
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
            <input type="text" id="searchInput" placeholder="Pesquisar no blog...">
            <button onclick="searchPosts()"><i class="fas fa-search"></i></button>
        </div>
        
        <ul class="nav-links">
            <li><a href="Book club.php">Início</a></li>
            <li><a href="ofertas.php">Ofertas</a></li>
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
    <section class="hero blog-hero">
        <div class="container">
            <div class="hero-content">
                <h1>O Blog do Book Club</h1>
                <p>Resenhas, dicas de leitura, curiosidades literárias e muito mais para alimentar sua paixão pelos livros.</p>
                <a href="#blog" class="hero-btn">Explorar Artigos</a>
            </div>
        </div>
    </section>

    <!-- Seção de Blog -->
    <section class="featured" id="blog">
        <div class="container">
            <div class="section-title">
                <h2>Últimos <span>Artigos</span></h2>
                <p>Confira as publicações mais recentes da nossa equipe de leitores apaixonados</p>
            </div>

            <div class="blog-grid">
                <!-- Posts Principais -->
                <div class="blog-posts">
                    <!-- Post 1 -->
                    <article class="blog-post">
                        <div class="post-image">
                            <a href="post-como-ler-mais.html">
                                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Como Ler Mais em 2025">
                            </a>
                            <span class="post-category">Dicas de Leitura</span>
                        </div>
                        <div class="post-info">
                            <h2 class="post-title">
                                <a href="post-como-ler-mais.html">Como Ler 50 Livros em 2025 (Mesmo com uma Rotina Apertada)</a>
                            </h2>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Ana Silva</span>
                                <span><i class="far fa-calendar"></i> 12 de Abril de 2025</span>
                                <span><i class="far fa-clock"></i> 8 min de leitura</span>
                            </div>
                            <p class="post-excerpt">
                                Descubra estratégias práticas para incorporar a leitura no seu dia a dia, mesmo com uma agenda lotada. Com pequenos ajustes, você pode transformar minutos ociosos em momentos de crescimento e prazer.
                            </p>
                            <a href="post-como-ler-mais.html" class="read-more">
                                Ler artigo completo <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- Post 2 -->
                    <article class="blog-post">
                        <div class="post-image">
                            <a href="post-resenha-pai-rico.html">
                                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Resenha: Pai Rico, Pai Pobre">
                            </a>
                            <span class="post-category">Resenhas</span>
                        </div>
                        <div class="post-info">
                            <h2 class="post-title">
                                <a href="post-resenha-pai-rico.html">Resenha: Pai Rico, Pai Pobre — Por que este livro ainda é relevante em 2025?</a>
                            </h2>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Carlos Mendes</span>
                                <span><i class="far fa-calendar"></i> 8 de Abril de 2025</span>
                                <span><i class="far fa-clock"></i> 12 min de leitura</span>
                            </div>
                            <p class="post-excerpt">
                                Mais de 20 anos após sua publicação, "Pai Rico, Pai Pobre" continua transformando a forma como enxergamos dinheiro. Nesta resenha aprofundada, analisamos os princípios que resistiram ao tempo e os que precisam de atualização.
                            </p>
                            <a href="post-resenha-pai-rico.html" class="read-more">
                                Ler artigo completo <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- Post 3 -->
                    <article class="blog-post">
                        <div class="post-image">
                            <a href="post-livros-ia.html">
                                <img src="https://images.unsplash.com/photo-1677442135136-760c813dcc43?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="O Impacto da IA na Literatura">
                            </a>
                            <span class="post-category">Tecnologia & Livros</span>
                        </div>
                        <div class="post-info">
                            <h2 class="post-title">
                                <a href="post-livros-ia.html">Como a Inteligência Artificial Está Mudando o Mundo dos Livros</a>
                            </h2>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Beatriz Costa</span>
                                <span><i class="far fa-calendar"></i> 3 de Abril de 2025</span>
                                <span><i class="far fa-clock"></i> 10 min de leitura</span>
                            </div>
                            <p class="post-excerpt">
                                Dos escritores que usam IA para superar o bloqueio criativo até os leitores que personalizam suas histórias favoritas: explore como a tecnologia está redefinindo a experiência literária do século XXI.
                            </p>
                            <a href="post-livros-ia.html" class="read-more">
                                Ler artigo completo <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- Post 4 -->
                    <article class="blog-post">
                        <div class="post-image">
                            <a href="post-clube-leitura.html">
                                <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Como Criar um Clube de Leitura">
                            </a>
                            <span class="post-category">Comunidade</span>
                        </div>
                        <div class="post-info">
                            <h2 class="post-title">
                                <a href="post-clube-leitura.html">Guia Definitivo: Como Criar um Clube de Leitura que Dá Certo</a>
                            </h2>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Rafael Oliveira</span>
                                <span><i class="far fa-calendar"></i> 28 de Março de 2025</span>
                                <span><i class="far fa-clock"></i> 7 min de leitura</span>
                            </div>
                            <p class="post-excerpt">
                                Reunir amigos para discutir livros parece simples, mas manter o engajamento é um desafio. Compartilhamos dicas práticas para escolher livros, moderar debates e manter o clube ativo por anos.
                            </p>
                            <a href="post-clube-leitura.html" class="read-more">
                                Ler artigo completo <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <aside class="sidebar">
                    <!-- Posts Populares -->
                    <div>
                        <h3>Populares</h3>
                        <div class="popular-post">
                            <img src="https://images.unsplash.com/photo-1553729459-efe14ef6055d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Resenha: Mindset">
                            <div class="popular-post-content">
                                <h4><a href="post-resenha-mindset.html">Resenha: Mindset — A Atitude que Transforma Tudo</a></h4>
                                <span class="post-date">15 de Março</span>
                            </div>
                        </div>
                        <div class="popular-post">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Os 7 Hábitos das Pessoas Altamente Eficazes">
                            <div class="popular-post-content">
                                <h4><a href="post-resenha-7-habitos.html">Por que "Os 7 Hábitos" ainda é um best-seller?</a></h4>
                                <span class="post-date">10 de Março</span>
                            </div>
                        </div>
                        <div class="popular-post">
                            <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Sapiens: Uma Breve História da Humanidade">
                            <div class="popular-post-content">
                                <h4><a href="post-resenha-sapiens.html">Sapiens: O livro que explica quem somos</a></h4>
                                <span class="post-date">5 de Março</span>
                            </div>
                        </div>
                    </div>

                    <!-- Nuvem de Tags -->
                    <div>
                        <h3>Assuntos</h3>
                        <div class="tag-cloud">
                            <a href="#" class="tag">Autoajuda</a>
                            <a href="#" class="tag">Finanças</a>
                            <a href="#" class="tag">Ficção</a>
                            <a href="#" class="tag">Produtividade</a>
                            <a href="#" class="tag">Resenhas</a>
                            <a href="#" class="tag">Dicas</a>
                            <a href="#" class="tag">Tecnologia</a>
                            <a href="#" class="tag">Clássicos</a>
                        </div>
                    </div>

                    <!-- Newsletter Interna -->
                    <div style="margin-top: 30px; text-align: center;">
                        <h3 style="margin-bottom: 15px;">Receba novos artigos!</h3>
                        <p style="font-size: 0.9rem; margin-bottom: 15px; color: var(--gray);">Assine e não perca nenhuma publicação.</p>
                        <form class="newsletter-form" style="display: flex; flex-direction: column; gap: 10px;">
                            <input type="email" placeholder="Seu e-mail" style="padding: 10px; border-radius: 30px; border: 1px solid #eee;" required>
                            <button type="submit" style="padding: 10px; background: var(--primary); color: white; border: none; border-radius: 30px; font-weight: 600; cursor: pointer;">Assinar Blog</button>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- Newsletter Principal -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h3>Gostou do nosso conteúdo?</h3>
                <p>Assine nossa newsletter e receba artigos exclusivos, listas de leitura e promoções especiais toda semana.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Seu melhor e-mail" required>
                    <button type="submit">Assinar Newsletter</button>
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

        // Adicionar ao carrinho (mantido para consistência, mesmo que não usado diretamente no blog)
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

        // Função de Pesquisa (adaptada para posts)
        function searchPosts() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            alert("Funcionalidade de busca no blog será implementada em breve!\nBuscando por: " + query);
            // Em um cenário real, você filtraria os posts aqui
        }
        
        // Adiciona evento de tecla para a busca
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchPosts();
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
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>