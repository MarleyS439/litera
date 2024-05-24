<?php
   require_once("../dao/avatarDao.php");
   require_once("../dao/perfilDao.php");
   require_once(__DIR__ . "../../models/avatar.php");
   require_once(__DIR__ . "../../models/perfil.php");
   $avatar = new Avatar();
   $Perfil = new Perfil();

   $PerfilDao = new PerfilDao();

   switch($_POST['itemAvatar']){
        case 'base':
            $avatar -> setCodGenero($_POST['genero']);
            $avatar -> setCodCabelo(1);
            $avatar -> setCodRoupa(1);
            $avatar -> setCodPerfil($_POST['codUser']);
            try{
                $avatarDao = new AvatarDao();
                $avatarDao->insert($avatar);
                session_start();
                header('Location: ../views/avatar.php?status=cabelo');
            }catch (Exception $e){
                    echo $e;
            }
            break;
            case 'cabelo':
                $avatar -> setCodCabelo($_POST['cabelo']);
                $cod = $_POST['codUser'];
                try{
                    $avatarDao = new AvatarDao();
                    $avatarDao->updateCabelo( $cod,$avatar);
                    session_start();
                    header('Location: ../views/avatar.php?status=roupa');
                }catch (Exception $e){
                        echo $e;
                }
                break;
            case 'roupa':
                $avatar -> setCodRoupa($_POST['roupa']);
                $cod = $_POST['codUser'];
                try{
                    $avatarDao = new AvatarDao();
                    $avatarDao->updateRoupa( $cod,$avatar);
                    session_start();
                    header('Location: ../views/home.php');
                }catch (Exception $e){
                        echo $e;
                }
                break;
            case 'comprarRoupa':
                $avatar -> setCodRoupa($_POST['roupa']);
                $cod = $_POST['codUser'];
                $infoUsuario = PerfilDao::selectById($cod);
                $moeda = $infoUsuario['dinheiroPerfil'];
                // var_dump($moeda);
                if($moeda >= 100){
                    $money = $moeda - 100;
                    // echo($money);
                    try{
                        $avatarDao = new AvatarDao();
                        $avatarDao->updateRoupa( $cod,$avatar);
                        $resultado = PerfilDao::setMoney($cod, $money);

                        session_start();
                        header('Location: ../views/home.php');
                    }catch (Exception $e){
                            echo $e;
                    }
                }else{
                    header('Location: ../views/home.php?status=erro2');
                }
                break;

    }
    