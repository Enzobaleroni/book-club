
<?php

require '../model/CadastroModel.php';

if ($_POST){
         $fullname = $_POST['fullname'];
         $email = $_POST['email'];
         $password = $_POST['password'];
         $confirm_password = $_POST["confirm_password"] ?? null;

$result ($fullname, $email, $password, $confirm_password);

echo $result;

if($result){
   echo "Cadastro realizado com sucesso! ";
}else{
    echo "Não foi possivel realizar o cadastro.";
}
}