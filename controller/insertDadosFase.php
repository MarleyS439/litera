<?php
require_once("../dao/usuarioDao.php");
require_once("../dao/dadosJogoUsuarioDao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data !== null) {
        $id = $data['id'];
        $idFase = $data['idFase'];
        $pontos = $data['pontos'];
        $acertos = $data['acertos'];
        $erros = $data['erros'];

        try {
            // Atualiza o dinheiro do usuário no banco de dados
            $resultado = DadosJogoUsuarioDao::insert($id, $idFase, $pontos, $acertos, $erros);

            if ($resultado) {
                echo "Insert feito com sucesso!";
            } else {
                echo "Erro ao atualizar o dinheiro do usuário";
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
?>
