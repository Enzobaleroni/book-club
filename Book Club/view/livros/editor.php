<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Sistema de Biblioteca</title>
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
            text-align: center;
            margin-bottom: 40px;
        }

        .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
            color: var(--primary-dark);
        }

        .page-header h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        /* Formulário Estilizado */
        .form-container {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: var(--shadow-md);
            max-width: 800px;
            margin: 0 auto;
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
        }

        .form-table tr {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .form-table tr:last-child {
            border-bottom: none;
        }

        .form-table td {
            padding: 20px 15px;
            vertical-align: top;
        }

        .form-table td:first-child {
            font-weight: 600;
            width: 30%;
            color: var(--dark);
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            background-color: white;
            transition: var(--transition);
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .form-checkbox {
            width: 20px;
            height: 20px;
            accent-color: var(--primary);
        }

        .form-file {
            width: 100%;
            padding: 12px 0;
        }

        .current-cover {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .current-cover img {
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
            max-width: 150px;
        }

        .form-submit {
            display: block;
            width: 200px;
            margin: 30px auto 0;
            padding: 15px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-md);
        }

        .form-submit:hover {
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            background: var(--gray);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
            margin-right: 10px;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
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
        }

        @media (max-width: 768px) {
            .form-table td {
                display: block;
                width: 100%;
                padding: 10px 0;
            }
            
            .form-table td:first-child {
                width: 100%;
                padding-bottom: 5px;
            }
            
            .form-table tr {
                padding: 15px 0;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-secondary, .form-submit {
                width: 100%;
                margin: 5px 0;
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
            
            .form-container {
                padding: 20px;
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
            <a href="#">Início</a>
            <a href="#">Livros</a>
            <a href="#">Categorias</a>
            <a href="#">Sobre</a>
            <a href="#">Contato</a>
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
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">3</span>
            </a>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="main-content container">
        <div class="page-header">
            <h1>Editar Livro</h1>
            <p>Atualize as informações do livro selecionado</p>
        </div>
        
        <div class="form-container">
            <form method="POST" enctype="multipart/form-data" action="LivroController.php?acao=editar&id=123">
                <table class="form-table">
                    <tr>
                        <td><label for="titulo">Título:</label></td>
                        <td><input type="text" id="titulo" name="titulo" class="form-input" value="Dom Casmurro" required></td>
                    </tr>
                    <tr>
                        <td><label for="autor">Autor:</label></td>
                        <td><input type="text" id="autor" name="autor" class="form-input" value="Machado de Assis" required></td>
                    </tr>
                    <tr>
                        <td><label for="ano_publicacao">Ano:</label></td>
                        <td><input type="number" id="ano_publicacao" name="ano_publicacao" class="form-input" value="1899"></td>
                    </tr>
                    <tr>
                        <td><label for="categoria_id">Categoria:</label></td>
                        <td>
                            <select id="categoria_id" name="categoria_id" class="form-select">
                                <option value="">--Selecione--</option>
                                <option value="1">Ficção Científica</option>
                                <option value="2" selected>Romance</option>
                                <option value="3">Terror</option>
                                <option value="4">Fantasia</option>
                                <option value="5">Biografia</option>
                                <option value="6">História</option>
                                <option value="7">Autoajuda</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="disponibilidade">Disponível:</label></td>
                        <td><input type="checkbox" id="disponibilidade" name="disponibilidade" class="form-checkbox" checked></td>
                    </tr>
                    <tr>
                        <td><label>Capa atual:</label></td>
                        <td>
                            <div class="current-cover">
                                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMzAwIiB2aWV3Qm94PSIwIDAgMjAwIDMwMCI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIzMDAiIGZpbGw9IiNlMWUxZTEiLz48cGF0aCBkPSJNNzUgNzVINTB2MTUwaDEwMFY3NUg5MHY1MGgxMFY3NXpNNzUgODVINjB2MTBoMTVWOjg1ek03NSAxMDVINjB2MTBoMTV2LTEwek03NSAxMjVINjB2MTBoMTV2LTEwek03NSAxNDVINjB2MTBoMTV2LTEwek03NSAxNjVINjB2MTBoMTV2LTEwek05NSAxMDVINzV2MTBoMjB2LTEwek05NSAxMjVINzV2MTBoMjB2LTEwek05NSAxNDVINzV2MTBoMjB2LTEwek05NSAxNjVINzV2MTBoMjB2LTEwek0xMDAgODVIOXYxMGg5MHYtMTB6TTE0NSA3NXYxNTBoMTBWNzV6TTE0NSA4NXYxMGgxMHYtMTB6TTE0NSAxMDV2MTBoMTB2LTEwek0xNDUgMTI1djEwaDEwdi0xMHpNMTQ1IDE0NXYxMGgxMHYtMTB6TTE0NSAxNjV2MTBoMTB2LTEweiIgZmlsbD0iIzk5OSIvPjwvc3ZnPg==" alt="Capa do Livro">
                                <input type="hidden" name="capa_existente" value="capa_dom_casmurro.jpg">
                            </div>
                            <input type="file" id="capa" name="capa" class="form-file">
                        </td>
                    </tr>
                </table>
                
                <div class="action-buttons">
                    <a href="#" class="btn-secondary">Cancelar</a>
                    <button type="submit" class="form-submit">Atualizar Livro</button>
                </div>
            </form>
        </div>
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

        // Simulação de dados do livro (em um caso real, estes dados viriam do PHP)
        document.addEventListener('DOMContentLoaded', function() {
            // Esta parte seria preenchida pelo PHP no backend
            // Aqui estamos apenas simulando os dados para demonstração
            const livro = {
                id: 123,
                titulo: "Dom Casmurro",
                autor: "Machado de Assis",
                ano_publicacao: 1899,
                categoria_id: 2,
                disponibilidade: true,
                capa: "capa_dom_casmurro.jpg"
            };
            
            // Em um cenário real, os valores seriam preenchidos pelo PHP
            // document.getElementById('titulo').value = "<?= htmlspecialchars($livro['titulo']) ?>";
            // etc...
        });
    </script>
</body>
</html>