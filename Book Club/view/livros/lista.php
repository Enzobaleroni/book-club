<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Livros - Biblioteca Digital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variáveis CSS */
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --secondary: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --success: #4cc9f0;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.08);
            --shadow-lg: 0 10px 20px rgba(0,0,0,0.1), 0 6px 6px rgba(0,0,0,0.1);
            --shadow-xl: 0 15px 25px rgba(0,0,0,0.15), 0 5px 10px rgba(0,0,0,0.05);
        }

        /* Reset e Estilos Globais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Segoe UI', Roboto, sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navbar Moderna */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            padding: 15px 5%;
            box-shadow: var(--shadow-sm);
            z-index: 1000;
            transition: var(--transition);
        }

        .navbar.scrolled {
            padding: 10px 5%;
            box-shadow: var(--shadow-md);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            width: 90px;
            height: 90px;
            object-fit: contain;
        }

        .logo-text {
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 25px;
        }

        .nav-links a {
            font-weight: 500;
            position: relative;
            color: var(--dark);
            padding: 5px 0;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary);
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-icons i {
            font-size: 1.2rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .nav-icons i:hover {
            color: var(--secondary);
            transform: translateY(-3px);
        }

        .search-bar {
            position: relative;
            width: 300px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 30px;
            background: rgba(0, 0, 0, 0.05);
            transition: var(--transition);
            padding-right: 40px;
        }

        .search-bar input:focus {
            outline: none;
            background: rgba(0, 0, 0, 0.08);
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
        }

        .search-bar button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--secondary);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }

        /* Conteúdo Principal */
        .main-content {
            margin-top: 120px;
            padding: 40px 0;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-title {
            font-size: 2.5rem;
            color: var(--primary-dark);
            position: relative;
            padding-bottom: 10px;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .add-book-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            border-radius: 30px;
            font-weight: 600;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .add-book-btn:hover {
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        /* Filtros e Pesquisa */
        .catalog-filters {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group label {
            font-weight: 500;
            font-size: 0.9rem;
        }

        .filter-select {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            background-color: white;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 10px 15px;
            padding-right: 40px;
            border: 1px solid #ddd;
            border-radius: 30px;
            font-family: 'Poppins', sans-serif;
        }

        .search-box button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
        }

        /* Grid de Livros */
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .book-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .book-cover {
            height: 200px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .book-card:hover .book-cover img {
            transform: scale(1.05);
        }

        .default-cover {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            font-size: 3rem;
        }

        .book-info {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .book-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .book-year {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .book-author {
            font-weight: 500;
            margin-bottom: 10px;
            color: var(--primary-dark);
        }

        .book-details {
            margin-top: 10px;
            font-size: 0.9rem;
        }

        .book-details p {
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .book-details i {
            color: var(--primary);
        }

        .availability {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-top: 10px;
        }

        .available {
            background-color: rgba(76, 201, 240, 0.2);
            color: #1686a0;
        }

        .unavailable {
            background-color: rgba(247, 37, 133, 0.2);
            color: #c31166;
        }

        .book-actions {
            padding: 15px 20px 20px;
            display: flex;
            gap: 10px;
            border-top: 1px solid #eee;
        }

        .action-btn {
            flex: 1;
            padding: 8px 15px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.9rem;
            text-align: center;
            transition: var(--transition);
        }

        .edit-btn {
            background: var(--primary);
            color: white;
        }

        .edit-btn:hover {
            background: var(--primary-dark);
        }

        .delete-btn {
            background: rgba(247, 37, 133, 0.1);
            color: var(--secondary);
        }

        .delete-btn:hover {
            background: var(--secondary);
            color: white;
        }

        /* Estado vazio */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
        }

        .empty-state i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state p {
            font-size: 1.2rem;
            color: var(--gray);
            margin-bottom: 30px;
        }

        /* Rodapé Moderno */
        .footer {
            background: var(--dark);
            color: white;
            padding: 80px 0 30px;
            position: relative;
            margin-top: 80px;
        }

        .footer-wave {
            position: absolute;
            top: -100px;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="%23212529" opacity=".25"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" fill="%23212529" opacity=".5"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%23212529"/></svg>');
            background-size: cover;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-column h4 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--secondary);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            transition: var(--transition);
            display: inline-block;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .footer-social a:hover {
            background: var(--secondary);
            transform: translateY(-5px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
        }

        /* Responsividade */
        @media (max-width: 992px) {
            .nav-links {
                display: none;
            }
            
            .books-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .catalog-filters {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-group {
                width: 100%;
            }
            
            .book-actions {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 15px;
            }
            
            .logo-text {
                font-size: 1.2rem;
            }
            
            .search-bar {
                width: 200px;
            }
            
            .books-grid {
                grid-template-columns: 1fr;
            }
            
            .page-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1MCIgaGVpZ2h0PSI1MCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiM0MzYxZWUiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cGF0aCBkPSJNNCAxOWEyIDIgMCAwIDAgMiAyaDEyYTIgMiAwIDAgMCAyLTJ2LTVhMiAyIDAgMCAwLTItMkg0YTIgMiAwIDAgMS0yLTJWNmEyIDIgMCAwIDEgMi0yaDE2YTIgMiAwIDAgMSAyIDJ2MGEyIDIgMCAwIDEtMiAySDRhMiAyIDAgMCAwLTIgMnYxMWEyIDIgMCAwIDAgMiAyeiI+PC9wYXRoPjwvc3ZnPg==" alt="Logo Biblioteca">
            <span class="logo-text">Book Club</span>
        </div>
        
        <div class="nav-links">
            <a href="#" class="active">Catálogo</a>
            <a href="#">Categorias</a>
            <a href="#">Autores</a>
            <a href="#">Empréstimos</a>
            <a href="#">Relatórios</a>
        </div>
        
        <div class="nav-icons">
            <div class="search-bar">
                <input type="text" placeholder="Pesquisar livros...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <a href="#">
                <i class="fas fa-user"></i>
            </a>
            <a href="#">
                <i class="fas fa-bell"></i>
            </a>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="main-content container">
        <div class="page-header">
            <h1 class="page-title">Catálogo de Livros</h1>
            <a href="criar.php?acao=criar" class="add-book-btn">
                <i class="fas fa-plus"></i> Adicionar Livro
            </a>
        </div>
        
        <!-- Filtros -->
        <div class="catalog-filters">
            <div class="search-box">
                <input type="text" placeholder="Buscar por título, autor...">
                <button><i class="fas fa-search"></i></button>
            </div>
            
            <div class="filter-group">
                <label for="categoria">Categoria</label>
                <select id="categoria" class="filter-select">
                    <option value="">Todas as categorias</option>
                    <option value="1">Ficção Científica</option>
                    <option value="2">Romance</option>
                    <option value="3">Terror</option>
                    <option value="4">Fantasia</option>
                    <option value="5">Biografia</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="disponibilidade">Disponibilidade</label>
                <select id="disponibilidade" class="filter-select">
                    <option value="">Todos</option>
                    <option value="1">Disponíveis</option>
                    <option value="0">Indisponíveis</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="ordenacao">Ordenar por</label>
                <select id="ordenacao" class="filter-select">
                    <option value="titulo">Título (A-Z)</option>
                    <option value="ano">Ano (Mais recente)</option>
                    <option value="autor">Autor</option>
                </select>
            </div>
        </div>
        
        <!-- Grid de Livros -->
        <div class="books-grid">
            <!-- Livro 1 -->
            <div class="book-card">
                <div class="book-cover">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMzAwIiB2aWV3Qm94PSIwIDAgMjAwIDMwMCI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIzMDAiIGZpbGw9IiNlMWUxZTEiLz48cGF0aCBkPSJNNzUgNzVINTB2MTUwaDEwMFY3NUg5MHY1MGgxMFY3NXpNNzUgODVINjB2MTBoMTVWOjg1ek03NSAxMDVINjB2MTBoMTV2LTEwek03NSAxMjVINjB2MTBoMTV2LTEwek03NSAxNDVINjB2MTBoMTV2LTEwek03NSAxNjVINjB2MTBoMTV2LTEwek05NSAxMDVINzV2MTBoMjB2LTEwek05NSAxMjVINzV2MTBoMjB2LTEwek05NSAxNDVINzV2MTBoMjB2LTEwek05NSAxNjVINzV2MTBoMjB2LTEwek0xMDAgODVIOXYxMGg5MHYtMTB6TTE0NSA3NXYxNTBoMTBWNzV6TTE0NSA4NXYxMGgxMHYtMTB6TTE0NSAxMDV2MTBoMTB2LTEwek0xNDUgMTI1djEwaDEwdi0xMHpNMTQ1IDE0NXYxMGgxMHYtMTB6TTE0NSAxNjV2MTBoMTB2LTEweiIgZmlsbD0iIzk5OSIvPjwvc3ZnPg==" alt="Capa do Livro">
                </div>
                <div class="book-info">
                    <h3 class="book-title">Dom Casmurro</h3>
                    <div class="book-year">1899</div>
                    <div class="book-author">Machado de Assis</div>
                    <div class="book-details">
                        <p><i class="fas fa-tag"></i> <span>Romance</span></p>
                        <p><i class="fas fa-user"></i> <span>Machado de Assis</span></p>
                    </div>
                    <div class="availability available">
                        <i class="fas fa-check-circle"></i> Disponível
                    </div>
                </div>
                <div class="book-actions">
                    <a href="LivroController.php?acao=editar&id=1" class="action-btn edit-btn">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="LivroController.php?acao=deletar&id=1" class="action-btn delete-btn" onclick="return confirm('Tem certeza que deseja excluir este livro?')">
                        <i class="fas fa-trash"></i> Excluir
                    </a>
                </div>
            </div>
            
            <!-- Livro 2 -->
            <div class="book-card">
                <div class="book-cover">
                    <div class="default-cover">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <div class="book-info">
                    <h3 class="book-title">O Cortiço</h3>
                    <div class="book-year">1890</div>
                    <div class="book-author">Aluísio Azevedo</div>
                    <div class="book-details">
                        <p><i class="fas fa-tag"></i> <span>Romance</span></p>
                        <p><i class="fas fa-user"></i> <span>Aluísio Azevedo</span></p>
                    </div>
                    <div class="availability unavailable">
                        <i class="fas fa-times-circle"></i> Indisponível
                    </div>
                </div>
                <div class="book-actions">
                    <a href="LivroController.php?acao=editar&id=2" class="action-btn edit-btn">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="LivroController.php?acao=deletar&id=2" class="action-btn delete-btn" onclick="return confirm('Tem certeza que deseja excluir este livro?')">
                        <i class="fas fa-trash"></i> Excluir
                    </a>
                </div>
            </div>
            
            <!-- Livro 3 -->
            <div class="book-card">
                <div class="book-cover">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMzAwIiB2aWV3Qm94PSIwIDAgMjAwIDMwMCI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIzMDAiIGZpbGw9IiNmZmQ0YjIiLz48cGF0aCBkPSJNNjAgNjB2MTgwSDQwVjYwaDIwek04MCA2MHYxODBoMjBWNjBIODB6TTEwMCA2MHYxODBoMjBWNjBoLTIwek0xMjAgNjB2MTgwaDIwVjYwaC0yMHpNMTQwIDYwdjE4aDIwdi0xOGgtMjB6TTE0MCA5OHY4MmgxOFY5OGgtMTh6TTE0MCAxODB2NjBoMjB2LTYwaC0yMHoiIGZpbGw9IiNlNWFlMDAiLz48L3N2Zz4=" alt="Capa do Livro">
                </div>
                <div class="book-info">
                    <h3 class="book-title">Iracema</h3>
                    <div class="book-year">1865</div>
                    <div class="book-author">José de Alencar</div>
                    <div class="book-details">
                        <p><i class="fas fa-tag"></i> <span>Romance</span></p>
                        <p><i class="fas fa-user"></i> <span>José de Alencar</span></p>
                    </div>
                    <div class="availability available">
                        <i class="fas fa-check-circle"></i> Disponível
                    </div>
                </div>
                <div class="book-actions">
                    <a href="LivroController.php?acao=editar&id=3" class="action-btn edit-btn">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="LivroController.php?acao=deletar&id=3" class="action-btn delete-btn" onclick="return confirm('Tem certeza que deseja excluir este livro?')">
                        <i class="fas fa-trash"></i> Excluir
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Estado vazio (seria exibido apenas quando não houver livros) -->
        <!--
        <div class="empty-state">
            <i class="fas fa-book-open"></i>
            <p>Nenhum livro encontrado.</p>
            <a href="LivroController.php?acao=criar" class="add-book-btn">
                <i class="fas fa-plus"></i> Adicionar Primeiro Livro
            </a>
        </div>
        -->
    </main>

    <script>
        // Efeito de navbar ao scrollar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Simulação de dados (em um caso real, estes dados viriam do PHP)
        document.addEventListener('DOMContentLoaded', function() {
            // Esta parte seria preenchida pelo PHP no backend
            // Simulando alguns livros para demonstração
            const livros = [
                {
                    id: 1,
                    titulo: "Dom Casmurro",
                    autor: "Machado de Assis",
                    ano_publicacao: 1899,
                    categoria: "Romance",
                    disponibilidade: true,
                    capa: "capa_dom_casmurro.jpg"
                },
                {
                    id: 2,
                    titulo: "O Cortiço",
                    autor: "Aluísio Azevedo",
                    ano_publicacao: 1890,
                    categoria: "Romance",
                    disponibilidade: false,
                    capa: null
                },
                {
                    id: 3,
                    titulo: "Iracema",
                    autor: "José de Alencar",
                    ano_publicacao: 1865,
                    categoria: "Romance",
                    disponibilidade: true,
                    capa: "capa_iracema.jpg"
                }
            ];
            
            // Em um cenário real, os livros seriam renderizados pelo PHP
            // <?php foreach($livros as $livro): ?> ... <?php endforeach; ?>
        });
    </script>
</body>
</html>