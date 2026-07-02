-- Dados de Teste para Book Club
-- Execute este script após criar as tabelas com schema.sql

USE book_club;

-- Inserir usuários de teste
INSERT INTO users (nome, email, senha, telefone, cpf, data_nascimento) VALUES
('João Silva', 'joao.silva@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '11987654321', '123.456.789-00', '1990-05-15'),
('Maria Santos', 'maria.santos@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '11987654322', '234.567.890-11', '1985-08-20'),
('Pedro Oliveira', 'pedro.oliveira@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '11987654323', '345.678.901-22', '1995-03-10'),
('Ana Costa', 'ana.costa@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '11987654324', '456.789.012-33', '1992-11-25'),
('Carlos Souza', 'carlos.souza@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '11987654325', '567.890.123-44', '1988-07-30');

-- Inserir livros de teste
INSERT INTO livros (titulo, autor, ano_publicacao, categoria_id, disponibilidade, capa, descricao, preco, estoque) VALUES
('O Senhor dos Anéis', 'J.R.R. Tolkien', 1954, 3, 1, 'senhor-dos-aneis.jpg', 'Uma épica aventura pela Terra-média', 89.90, 25),
('1984', 'George Orwell', 1949, 1, 1, '1984.jpg', 'Um clássico distópico sobre totalitarismo', 45.50, 30),
('Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 1997, 3, 1, 'harry-potter-1.jpg', 'O início da saga do bruxinho mais famoso', 39.90, 50),
('O Código Da Vinci', 'Dan Brown', 2003, 4, 1, 'codigo-davinci.jpg', 'Um thriller envolvente cheio de mistérios', 55.00, 20),
('A Arte da Guerra', 'Sun Tzu', 500, 2, 1, 'arte-guerra.jpg', 'Estratégias milenares aplicáveis hoje', 29.90, 40),
('Orgulho e Preconceito', 'Jane Austen', 1813, 5, 1, 'orgulho-preconceito.jpg', 'Um romance clássico inesquecível', 35.00, 35),
('O Poder do Hábito', 'Charles Duhigg', 2012, 6, 1, 'poder-habito.jpg', 'Como transformar sua vida através dos hábitos', 42.90, 45),
('A Menina que Roubava Livros', 'Markus Zusak', 2005, 1, 1, 'menina-livros.jpg', 'Uma história comovente sobre a Segunda Guerra', 48.00, 28);

-- Inserir pedidos de teste
INSERT INTO orders (user_id, total, status, payment_method, payment_status, created_at) VALUES
(1, 129.80, 'completed', 'credit_card', 'paid', DATE_SUB(NOW(), INTERVAL 5 DAY)),
(2, 89.90, 'processing', 'pix', 'paid', DATE_SUB(NOW(), INTERVAL 3 DAY)),
(3, 155.40, 'pending', 'boleto', 'pending', DATE_SUB(NOW(), INTERVAL 1 DAY)),
(4, 75.80, 'completed', 'credit_card', 'paid', DATE_SUB(NOW(), INTERVAL 7 DAY)),
(5, 42.90, 'pending', 'pix', 'pending', DATE_SUB(NOW(), INTERVAL 2 HOUR)),
(1, 87.90, 'processing', 'credit_card', 'paid', DATE_SUB(NOW(), INTERVAL 1 HOUR));

-- Inserir itens dos pedidos
INSERT INTO order_items (order_id, livro_id, quantidade, preco) VALUES
(1, 1, 1, 89.90),
(1, 2, 1, 45.50),
(2, 3, 2, 39.90),
(3, 4, 1, 55.00),
(3, 5, 2, 29.90),
(4, 6, 1, 35.00),
(4, 7, 1, 42.90),
(5, 8, 1, 48.00),
(6, 2, 1, 45.50);

-- Inserir comentários de teste
INSERT INTO comments (user_id, livro_id, comentario, rating, status, created_at) VALUES
(1, 1, 'Obra-prima da fantasia! Recomendo muito!', 5, 'approved', DATE_SUB(NOW(), INTERVAL 10 DAY)),
(2, 2, 'Livro muito relevante nos dias atuais.', 5, 'approved', DATE_SUB(NOW(), INTERVAL 8 DAY)),
(3, 3, 'Mágico! Perfeito para todas as idades.', 5, 'approved', DATE_SUB(NOW(), INTERVAL 6 DAY)),
(4, 4, 'Thriller envolvente do início ao fim!', 4, 'approved', DATE_SUB(NOW(), INTERVAL 4 DAY)),
(5, 7, 'Mudou completamente minha rotina!', 5, 'pending', DATE_SUB(NOW(), INTERVAL 1 DAY)),
(1, 8, 'História linda e emocionante.', 5, 'pending', DATE_SUB(NOW(), INTERVAL 3 HOUR));

-- Exibir resumo dos dados inseridos
SELECT 'Usuários cadastrados:' as Info, COUNT(*) as Total FROM users
UNION ALL
SELECT 'Livros cadastrados:', COUNT(*) FROM livros
UNION ALL
SELECT 'Pedidos realizados:', COUNT(*) FROM orders
UNION ALL
SELECT 'Comentários:', COUNT(*) FROM comments;
