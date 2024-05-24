<?php
// caminhos para os arquivos dao e model
require_once("../dao/usuarioDao.php");
require_once(__DIR__ . "../../models/usuario.php");
// variavel que vai mandar os dados para o model
$usuario = new Usuario();

// Verifica se o cadastro pode ser realizado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Faz a verificação se todos os campos foram preenchidos corretamente
    if (!empty($_POST['login_user']) && !empty($_POST['passwd_user'])) {
        // Todos os campos estão preenchidos corretamente
        // Esse array é apenas para o var dump ***
        $dados = array(
            'login' => $_POST['login_user'],
            'Senha' => $_POST['passwd_user'],
        );
        // try catch para conexão com o banco
        try {
            $conexao = Conexao::conectar();
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
        // inicio da verificaçao, conexao com o Dao
        $usuarioDao = UsuarioDao::checkCredentials($_POST['login_user'], $_POST['passwd_user']);
        // iniciando uma session caso login seja realizado
        if ($usuarioDao) {
            // vetor com as informaçoes do usuario
            $authUser = [
                'cod' => $usuarioDao['codUsuario'],
                'nome' => $usuarioDao['nomeUsuario'],
                'email' => $usuarioDao['emailUsuario'],
                'senha' => $_POST['passwd_user'],
                'banido' => $usuarioDao['banido'],
            ];
            // Iniciar a sessão apenas se as credenciais estiverem corretas
            session_start();
            $_SESSION["authUser"] = $authUser;
            header("Location: ../views/profile.php");
        } else {
            // caso negado, redirecionar para a página de login com uma mensagem de erro
            header("Location: ../views/login.php?status=erro1");
        }
    }
}
