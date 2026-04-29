<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar E-book - Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Style/Book Club.css">
    <style>
        .ebook-hero {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
        }

        .ebook-creator {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: var(--shadow-lg);
            max-width: 900px;
            margin: 0 auto 60px;
        }

        .ebook-creator h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 1rem;
            transition: var(--transition);
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .cover-preview {
            width: 150px;
            height: 220px;
            border: 2px dashed #ced4da;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 10px;
            margin: 20px auto;
            background-color: #f8f9fa;
            color: var(--gray);
            transition: var(--transition);
            cursor: pointer;
        }

        .cover-preview:hover {
            border-color: var(--primary);
            background-color: #f1f3f5;
        }

        .cover-preview i {
            font-size: 2rem;
        }

        #coverImage {
            display: none;
        }

        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
            display: none;
        }

        .chapter-list {
            margin: 30px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .chapter-item {
            background: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: var(--shadow-sm);
            position: relative;
        }

        .btn-add-chapter {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--secondary);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-bottom: 25px;
        }

        .btn-add-chapter:hover {
            background: #e51e76;
            transform: translateY(-2px);
        }

        .btn-remove {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #dc3545;
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-generate {
            display: block;
            width: 100%;
            padding: 16px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 30px;
            box-shadow: var(--shadow-md);
        }

        .btn-generate:hover {
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .preview-section {
            margin-top: 60px;
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: var(--shadow-lg);
            display: none;
        }

        .preview-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .preview-book {
            max-width: 300px;
            margin: 0 auto;
            text-align: center;
        }

        .preview-book img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: var(--shadow-md);
            margin-bottom: 20px;
        }

        .preview-book h3 {
            font-size: 1.5rem;
            margin: 10px 0;
            color: var(--dark);
        }

        .preview-book p {
            color: var(--gray);
            margin: 5px 0;
        }

        .btn-download {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--success);
            color: white;
            padding: 14px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            margin-top: 20px;
            box-shadow: var(--shadow-sm);
        }

        .btn-download:hover {
            background: #3ab7d9;
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        @media (max-width: 768px) {
            .ebook-creator, .preview-section {
                padding: 25px;
            }
            .cover-preview {
                width: 120px;
                height: 180px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar Moderna -->
    <nav class="navbar">
        <div class="logo">
            <img src="../img//logo book2.png" alt="Book Club Logo">
            <span class="logo-text">Book Club</span>
        </div>
        
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Pesquisar...">
            <button onclick="searchEbooks()"><i class="fas fa-search"></i></button>
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

    <!-- Banner Hero -->
    <section class="hero ebook-hero">
        <div class="container">
            <div class="hero-content">
                <h1>Crie Seu Próprio E-book</h1>
                <p>Transforme suas ideias em um livro digital profissional em minutos. Sem complicação, 100% online.</p>
                <a href="#creator" class="hero-btn">Começar Agora</a>
            </div>
        </div>
    </section>

    <!-- Seção de Criação de E-book -->
    <section class="featured" id="creator">
        <div class="container">
            <div class="section-title">
                <h2>Ferramenta de Criação de <span>E-books</span></h2>
                <p>Preencha os campos abaixo e gere seu e-book em PDF para download ou publicação.</p>
            </div>

            <div class="ebook-creator">
                <h2>✍️ Monte seu E-book</h2>

                <!-- Título -->
                <div class="form-group">
                    <label for="bookTitle">Título do Livro</label>
                    <input type="text" id="bookTitle" class="form-control" placeholder>
                </div>

                <!-- Autor -->
                <div class="form-group">
                    <label for="bookAuthor">Autor</label>
                    <input type="text" id="bookAuthor" class="form-control" placeholder>
                </div>

                <!-- Upload de Capa -->
                <div class="form-group">
                    <label>Capa do Livro</label>
                    <div class="cover-preview" id="coverPreview" onclick="document.getElementById('coverImage').click()">
                        <i class="far fa-image"></i>
                        <span>Clique para adicionar capa</span>
                        <img id="previewImage" class="preview-image" src="#" alt="Pré-visualização da capa">
                    </div>
                    <input type="file" id="coverImage" accept="image/*" onchange="previewCover(event)">
                </div>

                <!-- Sinopse -->
                <div class="form-group">
                    <label for="bookSynopsis">Sinopse (opcional)</label>
                    <textarea id="bookSynopsis" class="form-control" placeholder="Descreva brevemente o conteúdo do seu livro..."></textarea>
                </div>

                <!-- Capítulos -->
                <div class="form-group">
                    <label>Capítulos</label>
                    <button type="button" class="btn-add-chapter" onclick="addChapter()">
                        <i class="fas fa-plus"></i> Adicionar Capítulo
                    </button>
                    <div class="chapter-list" id="chapterList">
                        <div class="chapter-item">
                            <button type="button" class="btn-remove" onclick="removeChapter(this)">&times;</button>
                            <input type="text" class="form-control" placeholder="Título do Capítulo" style="margin-bottom: 10px;">
                            <textarea class="form-control" placeholder="Conteúdo do capítulo..." rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Botão Gerar -->
                <button type="button" class="btn-generate" onclick="generateEbook()">
                    <i class="fas fa-book"></i> Gerar E-book
                </button>
            </div>

            <!-- Pré-visualização do E-book (inicialmente oculta) -->
            <div class="preview-section" id="previewSection">
                <div class="preview-header">
                    <h2>🎉 Seu E-book está pronto!</h2>
                    <p>Veja a pré-visualização abaixo e faça o download.</p>
                </div>
                <div class="preview-book">
                    <img id="finalCover" src="https://via.placeholder.com/300x450/f8f9fa/6c757d?text=Capa+do+Livro" alt="Capa do E-book">
                    <h3 id="finalTitle">Título do Livro</h3>
                    <p id="finalAuthor">Por Autor</p>
                    <a href="#" class="btn-download" id="downloadBtn" onclick="simulateDownload(); return false;">
                        <i class="fas fa-download"></i> Baixar E-book (PDF)
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h3>Quer vender seu e-book?</h3>
                <p>Publique na nossa plataforma e alcance milhares de leitores. Taxa zero nos primeiros 3 meses!</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Seu e-mail para publicar" required>
                    <button type="submit">Quero Publicar</button>
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

        // Pré-visualizar capa
        function previewCover(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('previewImage');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    document.querySelector('.cover-preview span').style.display = 'none';
                    document.querySelector('.cover-preview i').style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        }

        // Adicionar capítulo
        function addChapter() {
            const chapterList = document.getElementById('chapterList');
            const chapter = document.createElement('div');
            chapter.className = 'chapter-item';
            chapter.innerHTML = `
                <button type="button" class="btn-remove" onclick="removeChapter(this)">&times;</button>
                <input type="text" class="form-control" placeholder="Título do Capítulo" style="margin-bottom: 10px;">
                <textarea class="form-control" placeholder="Conteúdo do capítulo..." rows="4"></textarea>
            `;
            chapterList.appendChild(chapter);
        }

        // Remover capítulo
        function removeChapter(button) {
            const chapter = button.closest('.chapter-item');
            chapter.remove();
        }

        // Gerar e-book (simulado)
        function generateEbook() {
            const title = document.getElementById('bookTitle').value;
            const author = document.getElementById('bookAuthor').value;
            const cover = document.getElementById('previewImage').src;

            if (!title || !author) {
                alert('Por favor, preencha o título e o autor do livro.');
                return;
            }

            // Atualizar pré-visualização
            document.getElementById('finalTitle').textContent = title;
            document.getElementById('finalAuthor').textContent = `Por ${author}`;
            if (cover && cover !== '#') {
                document.getElementById('finalCover').src = cover;
            }

            // Mostrar seção de pré-visualização
            document.getElementById('previewSection').style.display = 'block';

            // Rolar até a pré-visualização
            document.getElementById('previewSection').scrollIntoView({ behavior: 'smooth' });
        }

        // Simular download
        function simulateDownload() {
            const title = document.getElementById('bookTitle').value;
            alert(`🎉 Download iniciado!\n\nSeu e-book "${title}" está sendo gerado em PDF.\n\nEm uma versão real, o arquivo seria baixado automaticamente.`);
            
            // Notificação visual (opcional)
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
            notification.innerHTML = `<i class="fas fa-check-circle"></i> E-book gerado com sucesso!`;
            document.body.appendChild(notification);
            setTimeout(() => notification.remove(), 3000);
        }

        // Função de Pesquisa (simulada)
        function searchEbooks() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            if (query) {
                alert("Buscando por: " + query);
            }
        }
        
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchEbooks();
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

        // Adicionar animações CSS
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