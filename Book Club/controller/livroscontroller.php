<?php
include 'models/Livro.php';
include 'conexao.php';

$livro = new Livro($pdo);

// Detecta a ação (via GET ou POST)
$acao = $_GET['acao'] ?? 'listar';

switch($acao) {

    case 'listar':
        $livros = $livro->listar();
        include 'views/livros/listar.php';
        break;

    case 'criar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'categoria_id' => $_POST['categoria_id'],
                'disponibilidade' => isset($_POST['disponibilidade']) ? 1 : 0,
                'capa' => null
            ];
            if (!empty($_FILES['capa']['name'])) {
                $capa = 'uploads/' . basename($_FILES['capa']['name']);
                move_uploaded_file($_FILES['capa']['tmp_name'], $capa);
                $dados['capa'] = $capa;
            }
            $livro->criar($dados);
            header("Location: LivroController.php");
        } else {
            include 'views/livros/criar.php';
        }
        break;

    case 'editar':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'categoria_id' => $_POST['categoria_id'],
                'disponibilidade' => isset($_POST['disponibilidade']) ? 1 : 0,
                'capa' => $_POST['capa_existente']
            ];
            if (!empty($_FILES['capa']['name'])) {
                $capa = 'uploads/' . basename($_FILES['capa']['name']);
                move_uploaded_file($_FILES['capa']['tmp_name'], $capa);
                $dados['capa'] = $capa;
            }
            $livro->atualizar($id, $dados);
            header("Location: LivroController.php");
        } else {
            $livro = $livroModel->buscar($id);
            include 'views/livros/editar.php';
        }
        break;

    case 'deletar':
        $id = $_GET['id'];
        $livro->deletar($id);
        header("Location: LivroController.php");
        break;
}
?>
