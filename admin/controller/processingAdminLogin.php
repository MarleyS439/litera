<?php
// link para o dao e model 
require_once("../../dao/adminDao.php");
require_once(__DIR__."../../model/admin.php");
// variavel que vai mandar os dados para o model
$admin = new Admin();
// verificar se o cadastro pode ser realizado)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Faz a verificação se todos os campos foram preenchidos corretamente
    if (!empty($_POST['email_admin']) && !empty($_POST['passwd_admin'])) {
            // Verifica se o email é válido
            if (filter_var($_POST['email_admin'], FILTER_VALIDATE_EMAIL)) {
                // Todos os campos estão preenchidos corretamente
                // Esse array é apenas para o var dump ***
                $dados = array(
                    'Email' => $_POST['email_admin'],
                    'Senha' => $_POST['passwd_admin'],
                );
                // try catch para conexão com o banco
                try{
                    $conexao = Conexao::conectar();
                }catch(PDOException $e){
                    die("Erro na conexão com o banco de dados: " . $e->getMessage());
                }
                // inicio da verificaçao, conexao com o Dao
                $adminDao = AdminDao::checkCredentials($_POST['email_admin'], $_POST["passwd_admin"]);
                // iniciando uma session caso login seja realizado
                if($adminDao){
                    // vetor com as informaçoes do usuario
                    $authAdmin = [
                        'cod' => $adminDao['codAdmin'],
                        'nome' => $adminDao['nomeAdmin'],
                        'email' => $adminDao['emailAdmin'],
                    ];
                    // Iniciar a sessão apenas se as credenciais estiverem corretas
                    session_start();
                    $_SESSION["authAdmin"] = $authAdmin;
                    header("Location: ../view/home.php");
                }else{
                    // caso negado, redirecionar para a página de login com uma mensagem de erro
                     header("Location: ../view/index.php?status=erro1");
                }
            } else {
                echo "Email inválido.";
            }
    } else {
        // Para o caso de o usuário não digitar nada. Por segurança, para caso desative as formas obrigatórioas de FORM required
        echo "Todos os campos são obrigatórios.";
    }
}
