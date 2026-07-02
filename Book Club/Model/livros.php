<?php
class Livro {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Listar todos os livros
    public function listar() {
        $sql = "SELECT livros.*, categorias.nome AS categoria 
                FROM livros 
                LEFT JOIN categorias ON livros.categoria_id = categorias.id";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar um livro pelo id
    public function buscar($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM livros WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Criar novo livro
    public function criar($dados) {
        $sql = "INSERT INTO livros (titulo, autor, ano_publicacao, categoria_id, disponibilidade, capa) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $dados['titulo'], 
            $dados['autor'], 
            $dados['ano_publicacao'], 
            $dados['categoria_id'], 
            $dados['disponibilidade'], 
            $dados['capa']
        ]);
    }

    // Atualizar livro
    public function atualizar($id, $dados) {
        $sql = "UPDATE livros SET titulo=?, autor=?, ano_publicacao=?, categoria_id=?, disponibilidade=?, capa=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $dados['titulo'], 
            $dados['autor'], 
            $dados['ano_publicacao'], 
            $dados['categoria_id'], 
            $dados['disponibilidade'], 
            $dados['capa'], 
            $id
        ]);
    }

    // Excluir livro
    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM livros WHERE id=?");
        $stmt->execute([$id]);
    }
}
?>
