<?php
class Conexao
{
    public static function conectar()
    {
        try {
            //informações do banco de dados
            $servidor = "mysql-phpmyadmin";
            $banco = "dblitera";
            $usuario = "root";
            $senha = "12345";

            //$conexao = new PDO("TIPO_BANCO:host=SERVIDOR;dbname=NOME_BANCO", "USUARIO", "SENHA"); 
            $conexao = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);

            //se acontecer alguma coisa de errado no banco, conseguimos ver melhor o erro
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $conexao;
        } catch (PDOException $e) {
            //tratar erro de conexão
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }
}
