<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidade - Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variáveis CSS consistentes com o Book Club */
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
        }

        /* Estilos consistentes com o Book Club */
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
            padding-top: 120px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .privacy-header {
            text-align: center;
            margin-bottom: 50px;
            padding: 40px 0;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
        }

        .privacy-header h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .privacy-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto;
        }

        .privacy-content {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 50px;
        }

        .privacy-section {
            margin-bottom: 40px;
        }

        .privacy-section h2 {
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light);
            position: relative;
        }

        .privacy-section h2::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 2px;
            background: var(--secondary);
        }

        .privacy-section p {
            margin-bottom: 15px;
            color: var(--dark);
        }

        .privacy-section ul {
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .privacy-section li {
            margin-bottom: 10px;
        }

        .highlight {
            background-color: rgba(67, 97, 238, 0.05);
            padding: 20px;
            border-left: 4px solid var(--primary);
            border-radius: 4px;
            margin: 20px 0;
        }

        .contact-info {
            background: var(--light);
            padding: 30px;
            border-radius: 8px;
            margin-top: 30px;
        }

        .back-btn {
            display: inline-block;
            padding: 12px 25px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            border-radius: 30px;
            font-weight: 600;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            margin-top: 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        @media (max-width: 768px) {
            body {
                padding-top: 100px;
            }
            
            .privacy-header h1 {
                font-size: 2rem;
            }
            
            .privacy-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="privacy-header">
            <h1>Política de Privacidade</h1>
            <p>Última atualização: 10 de Setembro de 2025</p>
        </header>

        <div class="privacy-content">
            <section class="privacy-section">
                <h2>1. Introdução</h2>
                <p>O Book Club valoriza a privacidade e segurança dos dados dos nossos usuários. Esta Política de Privacidade explica como coletamos, usamos, compartilhamos e protegemos suas informações quando você utiliza nossos serviços, site e aplicativos.</p>
                <p>Ao acessar ou usar nossos serviços, você concorda com os termos desta Política de Privacidade.</p>
            </section>

            <section class="privacy-section">
                <h2>2. Informações que Coletamos</h2>
                <p>Coletamos diferentes tipos de informações para fornecer e melhorar nossos serviços:</p>
                <ul>
                    <li><strong>Informações Pessoais:</strong> nome, e-mail, endereço, telefone e dados de pagamento quando você se registra ou faz uma compra.</li>
                    <li><strong>Informações de Uso:</strong> dados sobre como você interage com nosso site, incluindo endereço IP, tipo de navegador, páginas visitadas e tempo gasto.</li>
                    <li><strong>Dados de Cookies:</strong> utilizamos cookies e tecnologias similares para melhorar sua experiência e coletar informações sobre o uso do site.</li>
                    <li><strong>Informações de Dispositivo:</strong> tipo de dispositivo, sistema operacional e identificadores exclusivos.</li>
                </ul>
            </section>

            <section class="privacy-section">
                <h2>3. Como Utilizamos Suas Informações</h2>
                <p>Utilizamos suas informações para:</p>
                <ul>
                    <li>Processar suas transações e gerenciar sua conta</li>
                    <li>Fornecer, manter e melhorar nossos serviços</li>
                    <li>Comunicar-nos com você sobre produtos, serviços, promoções e atualizações</li>
                    <li>Personalizar sua experiência e recomendar conteúdo relevante</li>
                    <li>Garantir a segurança e prevenir fraudes</li>
                    <li>Cumprir obrigações legais e regulatórias</li>
                </ul>
            </section>

            <section class="privacy-section">
                <h2>4. Compartilhamento de Informações</h2>
                <p>Podemos compartilhar suas informações com:</p>
                <ul>
                    <li><strong>Prestadores de serviços:</strong> empresas que nos auxiliam na operação do nosso negócio (processamento de pagamentos, entrega, marketing).</li>
                    <li><strong>Parceiros comerciais:</strong> para oferecer produtos ou serviços que possam ser do seu interesse (com seu consentimento).</li>
                    <li><strong>Exigências legais:</strong> quando necessário para cumprir com a lei, regulamentação ou processo legal.</li>
                    <li><strong>Transferências empresariais:</strong> em caso de fusão, aquisição ou venda de ativos.</li>
                </ul>
                <div class="highlight">
                    <p><strong>Não vendemos</strong> suas informações pessoais para terceiros.</p>
                </div>
            </section>

            <section class="privacy-section">
                <h2>5. Seus Direitos</h2>
                <p>Você tem o direito de:</p>
                <ul>
                    <li>Acessar e corrigir suas informações pessoais</li>
                    <li>Solicitar a exclusão de seus dados pessoais</li>
                    <li>Opor-se ao processamento de suas informações</li>
                    <li>Solicitar a portabilidade de seus dados</li>
                    <li>Retirar seu consentimento a qualquer momento</li>
                </ul>
                <p>Para exercer esses direitos, entre em contato conosco através dos canais listados abaixo.</p>
            </section>

            <section class="privacy-section">
                <h2>6. Segurança de Dados</h2>
                <p>Implementamos medidas de segurança técnicas e organizacionais apropriadas para proteger suas informações contra acesso não autorizado, alteração, divulgação ou destruição.</p>
                <p>No entanto, nenhum método de transmissão pela Internet ou armazenamento eletrônico é 100% seguro, e não podemos garantir segurança absoluta.</p>
            </section>

            <section class="privacy-section">
                <h2>7. Retenção de Dados</h2>
                <p>Manteremos suas informações pessoais apenas pelo tempo necessário para cumprir as finalidades descritas nesta política, a menos que um período de retenção mais longo seja exigido ou permitido por lei.</p>
            </section>

            <section class="privacy-section">
                <h2>8. Alterações nesta Política</h2>
                <p>Podemos atualizar nossa Política de Privacidade periodicamente. Notificaremos você sobre quaisquer alterações publicando a nova política nesta página e atualizando a data de "Última atualização" no topo deste documento.</p>
                <p>Recomendamos que você revise esta Política de Privacidade regularmente para estar ciente de quaisquer alterações.</p>
            </section>

            <section class="privacy-section">
                <h2>9. Contato</h2>
                <p>Se você tiver dúvidas sobre esta Política de Privacidade ou sobre como tratamos suas informações, entre em contato conosco:</p>
                <div class="contact-info">
                    <p><strong>Book Club</strong></p>
                    <p>E-mail: privacidade@bookclub.com</p>
                    <p>Telefone: (11) 3456-7890</p>
                    <p>Endereço: Av. dos Livros, 123, São Paulo - SP, CEP: 01234-567</p>
                </div>
            </section>

            <a href="Book Club.php" class="back-btn">
                <i class="fas fa-arrow-left"></i> Voltar para a Loja
            </a>
        </div>
    </div>
</body>
</html>