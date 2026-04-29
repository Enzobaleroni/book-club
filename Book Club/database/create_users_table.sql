-- Script para criar apenas a tabela users
-- Execute este no phpMyAdmin se a tabela não existir

-- Usar o banco book_club (ou criar se não existir)
CREATE DATABASE IF NOT EXISTS book_club;
USE book_club;

-- Criar tabela users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    cpf VARCHAR(14),
    data_nascimento DATE,
    is_admin TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Inserir usuário admin de teste
-- Email: admin@bookclub.com
-- Senha: admin123
INSERT INTO users (nome, email, senha, is_admin, created_at) VALUES
('Administrador', 'admin@bookclub.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NOW())
ON DUPLICATE KEY UPDATE is_admin = 1;

-- Verificar se foi criado
SELECT 'Tabela users criada com sucesso!' as Resultado;
SELECT * FROM users;
