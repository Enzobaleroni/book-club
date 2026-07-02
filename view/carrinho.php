<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho | Book Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Style/carrinho.css">
</head>
<body>
    <div id="particles-js"></div>

    <nav class="navbar">
        <div class="logo">
            <img src="img//logo book2.png" alt="Book Club Logo">
            <span class="logo-text">Book Club</span>
        </div>
        
        <ul class="nav-links">
            <li><a href="Book Club.php">Início</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
        </ul>
        
        <a href="carrinho.php" class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count" id="cartCount">0</span>
        </a>
    </nav>

    <div class="cart-container">
        <div class="cart-card">
            <div class="cart-header">
                <h1>Seu Carrinho</h1>
                <p>Revise seus itens antes de finalizar a compra</p>
            </div>

            <div class="cart-content">
                <ul class="cart-items" id="cartItems">
                    <!-- Itens serão inseridos via JavaScript -->
                </ul>

                <div class="order-summary">
                    <h3>Resumo do Pedido</h3>
                    
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="subtotal">R$ 0,00</span>
                    </div>
                    
                    <div class="summary-row">
                        <span>Frete</span>
                        <span id="shipping">Grátis</span>
                    </div>
                    
                    <div class="summary-row">
                        <span>Descontos</span>
                        <span id="discount">R$ 0,00</span>
                    </div>
                    
                    <div class="summary-row summary-total">
                        <span>Total</span>
                        <span id="total">R$ 0,00</span>
                    </div>
                    
                    <button class="checkout-btn" id="checkoutBtn">
                        <i class="fas fa-credit-card"></i> Finalizar Compra
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="JavaScript/carrinho.js"></script>
</body>
</html>