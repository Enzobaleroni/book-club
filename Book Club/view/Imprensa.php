<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprensa - Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Style/Book Club.css">
    <style>
        /* ✅ BANNER AZUL — ALTERADO AQUI */
        .press-hero {
            background: linear-gradient(135deg, #4361ee, #3a0ca3); /* Azul primário do site */
        }

        .press-kit {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: var(--shadow-md);
            margin-bottom: 50px;
            text-align: center;
        }

        .press-kit h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .press-kit p {
            margin-bottom: 30px;
            font-size: 1.1rem;
            color: var(--gray);
        }

        .download-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--primary);
            color: white;
            padding: 14px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }

        .download-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .press-release {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            margin-bottom: 30px;
        }

        .press-release:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .release-header {
            padding: 25px 30px;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .release-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin: 0;
            color: var(--dark);
        }

        .release-date {
            color: var(--gray);
            font-size: 0.95rem;
            font-weight: 500;
        }

        .release-content {
            padding: 30px;
        }

        .release-content p {
            margin-bottom: 15px;
            line-height: 1.7;
        }

        .release-content p:last-child {
            margin-bottom: 0;
        }

        .media-contact {
            background: linear-gradient(135deg, #f72585, #7209b7);
            color: white;
            border-radius: 12px;
            padding: 40px;
            text-align: center;
            margin: 60px 0;
        }

        .media-contact h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .media-contact p {
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        .contact-email {
            display: inline-block;
            background: white;
            color: #7209b7;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            margin-top: 15px;
        }

        .contact-email:hover {
            background: rgba(255,255,255,0.9);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .logo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        .logo-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            border: 2px dashed #e9ecef;
        }

        .logo-item:hover {
            background: #f1f3f5;
            border-color: var(--primary);
            transform: scale(1.03);
        }

        .logo-item img {
            max-height: 80px;
            margin-bottom: 15px;
            filter: grayscale(100%) opacity(0.7);
            transition: var(--transition);
        }

        .logo-item:hover img {
            filter: grayscale(0%) opacity(1);
        }

        .logo-item p {
            font-size: 0.9rem;
            color: var(--gray);
            margin: 0;
        }

        @media (max-width: 768px) {
            .release-header {
                flex-direction: column;
                text-align: center;
            }
            .press-kit {
                padding: 30px 20px;
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
            <input type="text" id="searchInput" placeholder="Pesquisar na imprensa...">
            <button onclick="searchPress()"><i class="fas fa-search"></i></button>
        </div>
        
        <ul class="nav-links">
            <li><a href="index.html">Início</a></li>
            <li><a href="ofertas.html">Ofertas</a></li>
            <li><a href="blog.html">Blog</a></li>
        </ul>
        
        <div class="nav-icons">
            <a href="carrinho.php" class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count" id="cartCount">0</span>
            </a>
        </div>
    </nav>

    <!-- BANNER HERO AZUL — ALTERADO AQUI -->
    <section class="hero press-hero">
        <div class="container">
            <div class="hero-content">
                <h1>Sala de Imprensa</h1>
                <p>Informações oficiais, releases, contatos e materiais para a mídia.</p>
                <a href="#press" class="hero-btn">Materiais para Imprensa</a>
            </div>
        </div>
    </section>

    <!-- Seção Principal -->
    <section class="featured" id="press">
        <div class="container">
            <div class="section-title">
                <h2>Recursos para <span>Imprensa</span></h2>
                <p>Tudo o que jornalistas e veículos de comunicação precisam para cobrir o Book Club</p>
            </div>

            <!-- Kit para Imprensa -->
            <div class="press-kit">
                <h3>Kit de Imprensa Completo</h3>
                <p>Logotipos, imagens, biografia da empresa, dados e declarações oficiais em um único arquivo compactado.</p>
                <a href="#" class="download-btn" onclick="alert('Download iniciado!'); return false;">
                    <i class="fas fa-download"></i> Baixar Kit (ZIP - 15MB)
                </a>
            </div>

            <!-- Releases Recentes -->
            <h3 style="text-align: center; margin: 50px 0 30px; font-size: 2rem;">Releases Recentes</h3>

            <!-- Release 1 -->
            <article class="press-release">
                <div class="release-header">
                    <h2 class="release-title">Book Club ultrapassa 1 milhão de usuários ativos</h2>
                    <span class="release-date">15 de Abril de 2025</span>
                </div>
                <div class="release-content">
                    <p><strong>São Paulo, 15 de abril de 2025</strong> — O Book Club, plataforma líder em venda e recomendação de livros no Brasil, anunciou hoje que atingiu a marca de 1 milhão de usuários ativos mensais, um crescimento de 120% em relação ao ano anterior.</p>
                    <p>O crescimento foi impulsionado pelo lançamento de novas funcionalidades, como recomendações personalizadas por IA, clube de assinaturas e parcerias com editoras independentes. “Estamos construindo mais do que uma loja: estamos criando uma comunidade de leitores apaixonados”, afirma Maria Oliveira, CEO da empresa.</p>
                    <p>A plataforma também anunciou expansão para Portugal e Moçambique ainda em 2025, com versões localizadas do catálogo e suporte em português europeu e africano.</p>
                </div>
            </article>


            <!-- Release 3 -->
            <article class="press-release">
                <div class="release-header">
                    <h2 class="release-title">Parceria com bibliotecas públicas amplia acesso a livros digitais</h2>
                    <span class="release-date">10 de Fevereiro de 2025</span>
                </div>
                <div class="release-content">
                    <p><strong>Brasília, 10 de fevereiro de 2025</strong> — Em parceria com o Ministério da Cultura, o Book Club disponibilizará gratuitamente 50 mil cópias digitais de clássicos da literatura brasileira e mundial para bibliotecas públicas de todo o país.</p>
                    <p>O projeto “Leitura para Todos” permitirá que frequentadores de bibliotecas acessem os títulos via QR Code ou em terminais digitais, sem necessidade de cadastro. “É um passo importante para reduzir o abismo digital e promover a equidade no acesso à cultura”, declara o Secretário de Cultura, Dr. Antônio Silva.</p>
                    <p>A iniciativa começa em 100 bibliotecas-piloto e será expandida gradualmente até o final de 2025.</p>
                </div>
            </article>

            <!-- Logotipos e Marcas -->
            <h3 style="text-align: center; margin: 60px 0 30px; font-size: 2rem;">Logotipos e Identidade Visual</h3>
            <p style="text-align: center; margin-bottom: 40px; color: var(--gray);">Use nossos logotipos de acordo com as diretrizes de marca. Clique para baixar versões em PNG, SVG e EPS.</p>

            <div class="logo-grid">
                <div class="logo-item">
                    <img src="logo book.png" alt="Logo Book Club Principal">
                    <p>Logo Principal (Colorido)</p>
                </div>
                <div class="logo-item">
                    <img src="logo-book-escuro.png" alt="Logo Book Club Escuro" style="filter: none;">
                    <p>Logo Versão Escura</p>
                </div>
                <div class="logo-item">
                    <img src="logo-book-branco.png" alt="Logo Book Club Branco" style="filter: none;">
                    <p>Logo Versão Clara</p>
                </div>
                <div class="logo-item">
                    <img src="favicon-32x32.png" alt="Favicon Book Club" style="max-height: 40px;">
                    <p>Ícone (Favicon)</p>
                </div>
            </div>

            <!-- Contato para Imprensa -->
            <div class="media-contact">
                <h2>Contato para a Imprensa</h2>
                <p>Para entrevistas, solicitações de informação ou envio de press kits personalizados, entre em contato com nossa assessoria de imprensa.</p>
                <a href="mailto:imprensa@bookclub.com.br" class="contact-email">
                    <i class="fas fa-envelope"></i> imprensa@bookclub.com.br
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h3>Receba nossos comunicados oficiais</h3>
                <p>Assine para receber releases, atualizações e convites para eventos exclusivos da imprensa.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Seu e-mail institucional" required>
                    <button type="submit">Assinar Comunicados</button>
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
                        <li><a href="como comprar.php">Como Comprar</a></li>
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
                
                <div class="footer-column">
                    <h4>VENDAS</h4>
                    <ul class="footer-links">
                        <li><a href="Criar E-book.php">Crie seu E-book</a></li>
                        <li><a href="vender livro usado.php">Vender livro usado</a></li>
                        <li><a href="E-book com IA.php">E-book com IA</a></li>
                        <li><a href="audio-book com IA.php">Audio-book com IA</a></li>
                    </ul>
                    
                    <div class="footer-social">
                        <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://youtube.com" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
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

        // Função de Pesquisa (simulada)
        function searchPress() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            if (query) {
                alert("Buscando por: " + query + "\n\nFuncionalidade completa disponível em breve.");
            }
        }
        
        // Adiciona evento de tecla para a busca
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchPress();
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