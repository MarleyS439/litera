<?php
// Caminhos para os arquivos dao e model
require_once("../dao/usuarioDao.php");
require_once(__DIR__ . "../../models/usuario.php");

// Variável que vai mandar os dados para o model
$usuario = new Usuario();

// Verifica se o cadastro pode ser realizado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se todos os campos foram preenchidos corretamente
        if (!empty($_POST['passwd_user']) && !empty($_POST['confirm_passwd_user'])) {
            // Verifica se as senhas coincidem
            if ($_POST['passwd_user'] == $_POST['confirm_passwd_user']) {
                    // Aqui deve ser processado o INSERT dos dados, em seguida direcionar o usuário para o Login
                    $usuario->setCodUsuario($_POST['cod_user']);
                    $usuario->setSenhaUsuario($_POST['passwd_user']);
                    
                    // Try catch para inserção no banco 
                    try {
                        $usuarioDao = new UsuarioDao();
                        $usuarioDao->updatePassword($usuario);
                        session_start();
                        header('Location: ../views/login.php?status=success');
                        exit(); // Importante para garantir que a execução seja interrompida após o redirecionamento
                    } catch (Exception $e) {
                        // header('Location: ../views/register.php?status=erro2');
                        echo ($e);
                    }
            } else {
                // Caso as senhas digitadas sejam diferentes, deve retornar um modal ou aviso.
                echo "As senhas não coincidem.";
            }
        } else {
            // Para o caso de o usuário não digitar nada. Por segurança, para caso desative as formas obrigatórias de FORM required
            echo "Todos os campos são obrigatórios.";
        }
}

?>
