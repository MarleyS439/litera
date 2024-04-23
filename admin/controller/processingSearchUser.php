<?php
// link dao e model
require_once("../../dao/usuarioDao.php");
require_once(__DIR__ . "../../../models/usuario.php");

$usuario = new Usuario();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data !== null) {

        try {
            // Pesquisa o usuário no banco de dados
            $resultado = UsuarioDao::searchUser($data['search']);

            if ($resultado) {
                echo json_encode($resultado); // Retorna o usuário encontrado como JSON
            } else {
                echo "Usuário não encontrado";
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
