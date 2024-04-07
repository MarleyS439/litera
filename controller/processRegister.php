<?php
// caminhos para os arquivos dao e model
require_once("../dao/usuarioDao.php");
require_once(__DIR__."../../models/usuario.php");
// variavel que vai mandar os dados para o model
$usuario = new Usuario();
// Verifica se o cadastro pode ser realizado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Faz a verificação se todos os campos foram preenchidos corretamente
    if (!empty($_POST['name_user']) && !empty($_POST['email_user']) && !empty($_POST['passwd_user']) && !empty($_POST['confirm_passwd_user'])) {
        // Verifica se a senha e a confirmação de senha são iguais
        if ($_POST['passwd_user'] == $_POST['confirm_passwd_user']) {
            // Verifica se o email é válido
            if (filter_var($_POST['email_user'], FILTER_VALIDATE_EMAIL)) {
                // Todos os campos estão preenchidos corretamente

                // Esse array é apenas para o var dump ***
                $dados = array(
                    'Nome' => $_POST['name_user'],
                    'Email' => $_POST['email_user'],
                    'Senha' => $_POST['passwd_user'],
                );

                // Aqui deve ser processado o INSERT dos dados, em seguida direcionar o usuário para o Login
                $usuario->setNomeUsuario($_POST['name_user']);
                $usuario->setEmailUsuario($_POST['email_user']);
                $usuario->setSenhaUsuario($_POST['passwd_user']);
                // dados que não podem ser nulos iniciados como zero
                $usuario->setPontuacaoUsuario(0);
                $usuario->setDinheiroUsuario(0);
                // iniciando o tutorial como 0, 0=false
                $usuario->setTutorialUsuario(0);
                // try catch para inserção no banco 
                try{
                    $usuarioDao = new UsuarioDao();
                    $usuarioDao->insert($usuario);
                    session_start();
                    header('Location: ../index.php');
                }catch (Exception $e){
                    header('Location: ../views/register.php');
                }
                echo "Cadastro realizado com sucesso!";
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
