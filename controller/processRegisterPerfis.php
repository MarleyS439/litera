<?php
// caminhos para os arquivos dao e model
require_once("../dao/perfilDao.php");
require_once("../dao/dadosJogoUsuarioDao.php");
require_once(__DIR__."../../models/perfil.php");
// variavel que vai mandar os dados para o model
$perfis = new Perfil();
$dadosJogo = new DadosJogoUsuarioDao();

// Verifica se o cadastro pode ser realizado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Faz a verificação se todos os campos foram preenchidos corretamente
    if (!empty($_POST['nome_perfil']) && !empty($_POST['data_nasc']) && !empty($_POST['genero']) && !empty($_POST['avatar']) && !empty($_POST['codUser'])) {
        // array para verificação de infos recebidas
        $dados = array(
            'Nome' => $_POST['nome_perfil'],
            'DataNasc' => $_POST['data_nasc'],
            'Genero' => $_POST['genero'],
            'Avatar' => $_POST['avatar'],
            'codUser' => $_POST['codUser'],
        );
        // var_dump($dados);
        // Aqui deve ser processado o INSERT dos dados, em seguida direcionar o usuário para o Login
        $perfis->setCodUsuario($_POST['codUser']);
        $perfis->setNomePerfil($_POST['nome_perfil']);
        $perfis->setGeneroPerfil($_POST['genero']);
        $perfis->setIconPerfil($_POST['avatar']);
        $perfis->setTutorial(0);
        $perfis->setDinheiroPerfil(0);
        $perfis->setDataNasc($_POST['data_nasc']);
        $perfis->setNivel(1);      
        $perfis->setDataCriacao(date("Y-m-d"));      
        $perfis->setDataModfc(date("Y-m-d"));            
        try{
            $PerfilDao = new PerfilDao();
            $PerfilDao->insert($perfis);
            session_start();
            $id = PerfilDao::searchUser($perfis->getNomePerfil());
            DadosJogoUsuarioDao::insert($id['codPerfil']);
            header('Location: ../views/profile.php?status=sucess');
        }catch (Exception $e){
            // header('Location: ../views/register.php?status=erro2');
            echo($e);
        }
    } else {
        // Para o caso de o usuário não digitar nada. Por segurança, para caso desative as formas obrigatórioas de FORM required
        echo "Todos os campos são obrigatórios.";
    }
}
