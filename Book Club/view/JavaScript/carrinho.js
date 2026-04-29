// Inicializa partículas
particlesJS("particles-js", {
    "particles": {
        "number": {
            "value": 80,
            "density": {
                "enable": true,
                "value_area": 800
            }
        },
        "color": {
            "value": "#ffffff"
        },
        "shape": {
            "type": "circle",
            "stroke": {
                "width": 0,
                "color": "#000000"
            }
        },
        "opacity": {
            "value": 0.3,
            "random": true,
            "anim": {
                "enable": true,
                "speed": 1,
                "opacity_min": 0.1,
                "sync": false
            }
        },
        "size": {
            "value": 3,
            "random": true,
            "anim": {
                "enable": true,
                "speed": 2,
                "size_min": 0.1,
                "sync": false
            }
        },
        "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.2,
            "width": 1
        },
        "move": {
            "enable": true,
            "speed": 1,
            "direction": "none",
            "random": true,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": true,
                "rotateX": 600,
                "rotateY": 1200
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": true,
                "mode": "grab"
            },
            "onclick": {
                "enable": true,
                "mode": "push"
            },
            "resize": true
        },
        "modes": {
            "grab": {
                "distance": 140,
                "line_linked": {
                    "opacity": 0.5
                }
            },
            "push": {
                "particles_nb": 4
            }
        }
    },
    "retina_detect": true
});

// Mapeamento de imagens para os livros
const bookImages = {
    "Como Convencer Alguém em 90 Segundos": "img/90s.jpg",
    "A Arte Da Guerra": "img/a arte da guerra.webp",
    "A Máquina Definitiva de Vendas": "img/a maquina.jpg",
    "As Armas da Persuasão": "img/As-Armas-da-Persuas_o.jpg",
    "Gatilhos Mentais": "img/gatilhos mentais.jpg",
    "Hábitos Atômicos": "img/habitos.jpg",
    "Mindset": "img/mindset.jpg",
    "O Poder do Hábito": "img/o poder do habito.jpg",
    "Os 7 Hábitos das Pessoas Altamente Eficazes": "img/os 7.webp"
};

// Carrega o carrinho do localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];
const cartItemsElement = document.getElementById('cartItems');
const cartCountElement = document.getElementById('cartCount');
const subtotalElement = document.getElementById('subtotal');
const totalElement = document.getElementById('total');
const checkoutBtn = document.getElementById('checkoutBtn');

// Atualiza o contador do carrinho
function updateCartCount() {
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    cartCountElement.textContent = totalItems;
}

// Renderiza os itens do carrinho
function renderCart() {
    cartItemsElement.innerHTML = '';
    
    if (cart.length === 0) {
        cartItemsElement.innerHTML = `
            <div class="empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <p>Seu carrinho está vazio</p>
                <a href="Book Club.php" class="continue-shopping">Continuar Comprando</a>
            </div>
        `;
        checkoutBtn.disabled = true;
        return;
    } else {
        checkoutBtn.disabled = false;
    }

    let subtotal = 0;

    cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        subtotal += itemTotal;
        
        const imageName = bookImages[item.name] || 'images/default-book.jpg';

        const li = document.createElement('li');
        li.className = 'cart-item';
        li.innerHTML = `
            <img src="${imageName}" alt="${item.name}" class="cart-item-image">
            <div class="cart-item-details">
                <h3 class="cart-item-title">${item.name}</h3>
                <p class="cart-item-price">R$ ${item.price.toFixed(2)}</p>
            </div>
            <div class="cart-item-actions">
                <button class="remove-item" onclick="removeItem(${index})">
                    <i class="fas fa-trash-alt"></i>
                </button>
                <div class="quantity-control">
                    <button class="quantity-btn" onclick="updateQuantity(${index}, -1)">-</button>
                    <span class="quantity-value">${item.quantity}</span>
                    <button class="quantity-btn" onclick="updateQuantity(${index}, 1)">+</button>
                </div>
            </div>
        `;
        cartItemsElement.appendChild(li);
    });

    // Atualiza os totais
    subtotalElement.textContent = `R$ ${subtotal.toFixed(2)}`;
    totalElement.textContent = `R$ ${subtotal.toFixed(2)}`;
    
    updateCartCount();
}

// Remove item do carrinho
function removeItem(index) {
    cart.splice(index, 1);
    saveCart();
    renderCart();
}

// Atualiza quantidade do item
function updateQuantity(index, change) {
    cart[index].quantity += change;
    
    if (cart[index].quantity <= 0) {
        cart.splice(index, 1);
    }
    
    saveCart();
    renderCart();
}

// Salva carrinho no localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Finaliza a compra
checkoutBtn.addEventListener('click', () => {
    alert('Compra finalizada com sucesso! Obrigado por comprar no Book Club.');
    cart = [];
    saveCart();
    renderCart();
});

// Renderiza o carrinho ao carregar a página
document.addEventListener('DOMContentLoaded', renderCart);