<?php
    require_once("../../dao/roupaDao.php");
    require_once(__DIR__ . "../../../models/roupa.php");
    require_once("../../dao/generoDao.php");
    require_once(__DIR__ . "../../../models/genero.php");
    require_once("../../dao/cabeloDao.php");
    require_once(__DIR__ . "../../../models/cabelo.php");
    
    switch($_POST['tipoItem']){
        case "Roupa":
            $roupa = new Roupa();
            $roupa->setNomeRoupa($_POST['nomeItem']);
            $roupa->setPrecoRoupa($_POST['precoItem']);
            $nomeFoto = $roupa->salvarImagem($_POST['nomeFoto']);
            $roupa->setImgRoupa($nomeFoto);
            $roupa->setTokenRoupa($roupa->generateToken());
            // var_dump($roupa);
            try{
                $roupaDao = new RoupaDao();
                $roupaDao->insert($roupa);
                session_start();
                header('Location: ../view/loja.php?status=sucess');
            }catch (Exception $e){
                    echo $e;
            }
        break;
        case "Cabelo":
            $cabelo = new Cabelo();
            $cabelo->setNomeCabelo($_POST['nomeItem']);
            $cabelo->setPrecoCabelo($_POST['precoItem']);
            $nomeFoto = $cabelo->salvarImagem($_POST['nomeFoto']);
            $cabelo->setImgCabelo($nomeFoto);
            $cabelo->setTokenCabelo($cabelo->generateToken());
            // var_dump($cabelo);
            try {
                $cabeloDao = new CabeloDao();
                $cabeloDao->insert($cabelo);
                session_start();
                header('Location: ../view/loja.php?status=success');
            } catch (Exception $e) {
                echo $e;
            }
            break;
        case "Genero":
            $genero = new Genero();
            $genero->setNomeGenero($_POST['nomeItem']);
            $genero->setPrecoGenero($_POST['precoItem']);
            $nomeFoto = $genero->salvarImagem($_POST['nomeFoto']);
            $genero->setImgGenero($nomeFoto);
            $genero->setTokenGenero($genero->generateToken());
            // var_dump($genero);
            try {
                $generoDao = new GeneroDao();
                $generoDao->insert($genero);
                session_start();
                header('Location: ../view/loja.php?status=success');
            } catch (Exception $e) {
                echo $e;
            }
            break;
    }
?>