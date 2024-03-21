<?php
// link dao e model
require_once("../../dao/usuarioDao.php");
require_once(__DIR__."../../../models/usuario.php");
// variavel que vai mandar os dados para o model
$usuario = new Usuario();
// switch case para cada metodo, suspend e update 
switch($_POST['acao']){
    // caso seja banido
    case 'suspend':
        // valor 1 para contar como verdadeiro no mySql
        $usuario->setCodUsuario($_POST["codUsuario"]);
        $usuario->setBanido(1);
        try {
            $usuariorDao = UsuarioDao::suspend($_POST["codUsuario"], $usuario);
            header("Location: ../view/users.php?success");
          } catch (Exception $e) {
           echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
    break;
    // caso seja desbanido
    case 'Unbanned':
        // valor 0 para contar como falso no mySql
        $usuario->setCodUsuario($_POST["codUsuario"]);
        $usuario->setBanido(0);
        try {
            $usuariorDao = UsuarioDao::suspend($_POST["codUsuario"], $usuario);
            header("Location: ../view/users.php?success");
        } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        } 
    break;
    // update dos dados
    case 'update':
        // verificação se esta vazio
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Faz a verificação se todos os campos foram preenchidos corretamente
            if (!empty($_POST['name_user']) && !empty($_POST['email_user']) && !empty($_POST['passwd_user']) && !empty($_POST['confirm_passwd_user'])) {
                // Verifica se a senha e a confirmação de senha são iguais
                if ($_POST['passwd_user'] == $_POST['confirm_passwd_user']) {
                    // Verifica se o email é válido
                    if (filter_var($_POST['email_user'], FILTER_VALIDATE_EMAIL)) {
                        // Todos os campos estão preenchidos corretamente
                        // Aqui deve ser processado o INSERT dos dados, em seguida direcionar o usuário para o Login
                        $usuario->setNomeUsuario($_POST['name_user']);
                        $usuario->setEmailUsuario($_POST['email_user']);
                        $usuario->setSenhaUsuario($_POST['passwd_user']);
                        try {
                            $usuariorDao = UsuarioDao::update($_POST["codUsuario"], $usuario);
                            header("Location: ../view/users.php?success");
                        } catch (Exception $e) {
                        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
                        } 
            
                    } else {
                        echo "Email inválido.";
                    }
                } else {
                    // Caso as senhas digitadas sejam diferetesn, deve retornar um modal ou aviso.
                    echo "As senhas não coincidem.";
                }
            } else {
                // Para o caso de o usuário não digitar nada. Por segurança, para caso desative as formas obrigatórioas de FORM required
                echo "Todos os campos são obrigatórios.";
            }
        }
    break;

}
