<?php
// caminho para os arquivos dao e model
    require_once("../dao/usuarioDao.php");
    require_once(__DIR__ . "../../models/usuario.php");
    // variavel que vai mandar os dados para o model
    $usuario = new Usuario();
    // verifica se o update pode ser realizado
    if($_SERVER["REQUEST_METHOD"]=="POST"){  
        // verificação se os campos foram preenchidos
        if(!empty($_POST['name_user'])){
           $usuario->setNomeUsuario($_POST['name_user']);
            // var_dump($usuario);
           try{
            $usuarioDao = UsuarioDao::updateName($_POST['id_user'], $usuario);
            header("Location: ../views/home.php");
           } catch (Exception $e){
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
           }
        }
    }


?>