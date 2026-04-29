<?php

class AdminController {

    // Exibe o dashboard

    public function dashboard() {

        // Pega dados (pode vir de models)

        $totalUsers = User::count();

        $totalPosts = Post::count();

        // Renderiza a view

        require_once __DIR__ . '/../views/admin/dashboard.php';

    }
 
    // Lista todos os usuários

    public function listUsers() {

        $users = User::all();

        require_once __DIR__ . '/../views/admin/users.php';

    }
 
    // Exibe formulário de edição de usuário

    public function editUser($id) {

        $user = User::find($id);

        require_once __DIR__ . '/../views/admin/edit_user.php';

    }
 
    // Atualiza os dados de um usuário

    public function updateUser($id, $data) {

        $user = User::find($id);

        $user->name = $data['name'];

        $user->email = $data['email'];

        $user->save();
 
        header("Location: /admin/users");

    }
 
    // Exclui um usuário

    public function deleteUser($id) {

        $user = User::find($id);

        $user->delete();

        header("Location: /admin/users");

    }

}

 