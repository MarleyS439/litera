<?php
require_once("../dao/usuarioDao.php");
require_once("../dao/dadosJogoUsuarioDao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data !== null) {
        $id = $data['id'];
        $idFase = $data['idFase'];
        $pontos = $data['pontos'];
        $acertos = $data['acertos']; // Ajustado para acertos
        $erros = $data['erros'];
        try {
            // Consulta da pontuação de usuário
            $pontuacao = DadosJogoUsuarioDao::selectById($id, $idFase);
            // Atualiza os dados do jogo do usuário no banco de dados
            $resultado = DadosJogoUsuarioDao::update($id, $idFase, $pontos, $acertos, $erros);          
            if ($resultado) {
                echo "Insert feito com sucesso!";
            } else {
                echo "Erro ao inserir os valores!";
            }
        } catch (PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        }
    } else {
        echo "Dados inválidos recebidos"; // Responde ao cliente se os dados recebidos forem inválidos
    }
} else {
    echo "Método de requisição inválido"; // Responde ao cliente se o método de requisição for inválido
}
