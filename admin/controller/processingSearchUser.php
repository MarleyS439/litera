<?php
// link dao e model
require_once("../../dao/perfilDao.php");
require_once("../../dao/dadosJogoUsuarioDao.php");
require_once(__DIR__ . "../../../models/usuario.php");

$usuario = new Usuario();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data !== null) {

        try {
            // Pesquisa o usuário no banco de dados
            $id = PerfilDao::searchUser($data['search']);
            $resultado = DadosJogoUsuarioDao::searchUser($id['codPerfil'], $data['selectJogo']);

            if ($resultado) {
                $response = [
                    'fasesConcluidas' => $id['fasesConcluidas'], // Acessando o valor 'fasesConcluidas' do array $id
                    'dadosJogo' => $resultado // Correção aqui, para acessar o primeiro objeto do array
                ];
                echo json_encode($response);
            } else {
                echo json_encode("Usuário não encontrado");
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
