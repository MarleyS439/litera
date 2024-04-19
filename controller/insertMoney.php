<?php
require_once("../dao/usuarioDao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data !== null) {
        $id = $data['id'];
        $money = $data['money'];

        try {
            // Atualiza o dinheiro do usuário no banco de dados
            $resultado = UsuarioDao::setGamesPoints($id, $money);

            if ($resultado) {
                echo "Atualização feita com sucesso!x'";
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
