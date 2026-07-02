<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central de Ajuda - Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary: #4f46e5;       /* roxo-azulado moderno */
            --primary-dark: #4338ca;
            --text: #1f2937;
            --text-light: #4b5563;
            --bg: #f8fafc;
            --card: #ffffff;
            --border: #e2e8f0;
            --shadow: 0 10px 25px -5px rgba(0,0,0,0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        /* Navbar */
        .navbar {
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 1rem 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .logo img {
            height: 38px;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .search-bar {
            flex: 1;
            max-width: 420px;
            margin: 0 2rem;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.8rem;
            border: 1px solid var(--border);
            border-radius: 9999px;
            font-size: 1rem;
        }

        .search-bar button {
            position: absolute;
            left: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-light);
            font-size: 1.1rem;
            cursor: pointer;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .cart-icon {
            font-size: 1.4rem;
            color: var(--text);
            position: relative;
            text-decoration: none;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -10px;
            background: var(--primary);
            color: white;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Hero / Header da ajuda */
        .help-header {
            text-align: center;
            padding: 5rem 5% 3rem;
            background: linear-gradient(135deg, #f0f4ff 0%, #e0e7ff 100%);
        }

        .help-header h1 {
            font-size: 3.2rem;
            margin-bottom: 1rem;
            color: var(--primary-dark);
        }

        .help-header p {
            font-size: 1.25rem;
            color: var(--text-light);
            max-width: 680px;
            margin: 0 auto;
        }

        /* Busca na ajuda */
        .search-help {
            max-width: 620px;
            margin: 2.5rem auto;
            position: relative;
        }

        .search-help input {
            width: 100%;
            padding: 1.1rem 1.5rem 1.1rem 3.5rem;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: 1.1rem;
            transition: all 0.25s;
        }

        .search-help input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79,70,229,0.15);
        }

        .search-help button {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--primary);
            font-size: 1.4rem;
            cursor: pointer;
        }

        /* FAQ */
        .faq-list {
            max-width: 820px;
            margin: 0 auto 5rem;
            padding: 0 5%;
        }

        .faq-item {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            margin-bottom: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.25s ease;
        }

        .faq-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px -8px rgba(0,0,0,0.1);
        }

        .faq-question {
            padding: 1.4rem 1.8rem;
            cursor: pointer;
            font-weight: 600;
            font-size: 1.15rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            transition: background 0.2s;
        }

        .faq-question:hover {
            background: #f8f9ff;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            padding: 0 1.8rem;
            background: #fafbff;
            transition: all 0.4s ease;
            line-height: 1.7;
            color: var(--text-light);
        }

        .faq-item.active .faq-answer {
            max-height: 500px; /* ajuste se precisar de respostas muito longas */
            padding: 1.8rem;
        }

        .faq-question i {
            transition: transform 0.3s;
            color: var(--primary);
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        /* Footer (mantive parecido, mas limpei) */
        .footer {
            background: #0f172a;
            color: #cbd5e1;
            padding: 4rem 5% 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 3rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-column h4 {
            color: white;
            margin-bottom: 1.4rem;
            font-size: 1.15rem;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            display: block;
            margin-bottom: 0.8rem;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: #c7d2fe;
        }

        .footer-social {
            display: flex;
            gap: 1.2rem;
            margin-top: 1.5rem;
        }

        .footer-social a {
            color: #94a3b8;
            font-size: 1.5rem;
            transition: color 0.2s;
        }

        .footer-social a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 3rem;
            border-top: 1px solid #334155;
            margin-top: 3rem;
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .navbar { flex-wrap: wrap; gap: 1rem; }
            .search-bar { order: 3; margin: 1rem 0; max-width: none; }
            .nav-links { gap: 1.2rem; font-size: 0.95rem; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="img/logo book2.png" alt="Book Club Logo">
            <span class="logo-text">Book Club</span>
        </div>

        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Pesquisar livros...">
            <button><i class="fas fa-search"></i></button>
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

    <!-- Seção principal -->
    <section class="help-section">
        <div class="help-header">
            <h1>Central de Ajuda</h1>
            <p>Encontre respostas rápidas para as dúvidas mais comuns ou fale diretamente com nosso time de suporte.</p>
        </div>

        <div class="search-help">
            <input type="text" id="faqSearch" placeholder="Digite sua dúvida (ex: devolução, prazo, pagamento)">
            <button><i class="fas fa-search"></i></button>
        </div>

        <div class="faq-list">
            <div class="faq-item">
                <div class="faq-question">
                    Como faço para comprar um livro?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Navegue pela loja, escolha o livro desejado, clique em "Adicionar ao Carrinho" e siga para o checkout. Preencha os dados de entrega e finalize o pagamento. Pronto!
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    Qual o prazo de entrega?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Depende do CEP e da opção de frete escolhida. Normalmente varia de 3 a 12 dias úteis. Após aprovação do pagamento, enviamos o código de rastreio por e-mail.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    Posso devolver um livro?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Sim! Você tem 7 dias corridos após o recebimento para solicitar devolução (direito de arrependimento). O livro precisa estar em perfeito estado. Inicie o processo pelo "Meus Pedidos".
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    Aceitam pagamento parcelado?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Sim! Cartão de crédito em até 12× sem juros. Também aceitamos PIX à vista (desconto em alguns produtos), boleto e débito online.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    Como acompanho meu pedido?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Você recebe um e-mail com o código de rastreio assim que o pedido for enviado. Acompanhe diretamente na área "Meus Pedidos" ou no site dos Correios.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    Vocês vendem livros usados?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Sim! Temos uma categoria especial de livros usados em excelente estado com preços bem mais acessíveis. Acesse "Livros Usados" no menu principal.
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h4>ATENDIMENTO</h4>
                    <ul class="footer-links">
                        <li><a href="formas de pagamento.php">Formas de Pagamento</a></li>
                        <li><a href="garantia.php">Garantia Book Club</a></li>
                        <li><a href="devolucoes.php">Devolução e Reembolso</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>SOBRE NÓS</h4>
                    <ul class="footer-links">
                        <li><a href="sobre-nos.php">Sobre Nós</a></li>
                        <li><a href="privacidade.php">Política de Privacidade</a></li>
                        <li><a href="ofertas.php">Ofertas</a></li>
                        <li><a href="blog.php">Book Club Blog</a></li>
                    </ul>
                </div>

                    </ul>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2025 Book Club. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Accordion simples com JS mínimo
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                item.classList.toggle('active');
            });
        });

        // Busca simples (opcional - pode melhorar depois)
        document.getElementById('faqSearch')?.addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            document.querySelectorAll('.faq-item').forEach(item => {
                const question = item.querySelector('.faq-question').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
                item.style.display = (question.includes(term) || answer.includes(term)) ? 'block' : 'none';
            });
        });
    </script>

</body>
</html>