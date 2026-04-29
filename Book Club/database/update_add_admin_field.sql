-- Script para adicionar campo is_admin em banco de dados existente
-- Execute este script se você já tem a tabela users criada

USE book_club;

-- Adicionar coluna is_admin se não existir
ALTER TABLE users 
ADD COLUMN IF NOT EXISTS is_admin TINYINT(1) DEFAULT 1 AFTER data_nascimento;

-- Verificar se a coluna foi adicionada
DESCRIBE users;

-- Mensagem de sucesso
SELECT 'Campo is_admin adicionado com sucesso!' as Resultado;
