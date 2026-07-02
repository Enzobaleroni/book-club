-- Script para criar usuário administrador
-- Execute este script após criar as tabelas

USE book_club;

-- Criar usuário admin
-- Email: admin@bookclub.com
-- Senha: admin123
INSERT INTO users (nome, email, senha, is_admin, created_at) VALUES
('Administrador', 'admin@bookclub.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NOW())
ON DUPLICATE KEY UPDATE is_admin = 1;

-- Criar mais um admin de teste
-- Email: matheus@bookclub.com
-- Senha: senha123
INSERT INTO users (nome, email, senha, is_admin, created_at) VALUES
('Matheus Admin', 'matheus@bookclub.com', '$2y$10$wZnI5zXPzKL5YfJz5rCNk.JN8jBh9FQP8GJLKGhLGj3K5X9L6K7O2', 1, NOW())
ON DUPLICATE KEY UPDATE is_admin = 1;

-- Verificar usuários admin criados
SELECT id, nome, email, is_admin, created_at FROM users WHERE is_admin = 1;
