<?php
require_once("../dao/perfilDao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nivelInsert = json_decode(file_get_contents('php://input'), true);
    if ($nivelInsert !== null) {
        $id = $nivelInsert['id'];
        $pontuacaoJogo = $nivelInsert['pontuacao'];

        // Obter informações do banco de dados para as contas
        $infoPontuacao = PerfilDao::selectPontuacaoNivel($id);
        $pontuacaoTotal = $infoPontuacao['pontuacaoPerfil'] + $pontuacaoJogo;
        $nivelNovo = 0; // Inicialmente, o novo nível é o mesmo que o nível atual

        // Atualização do nível com base na pontuação total
        if ($pontuacaoTotal < 100) {
            $nivelNovo = 1;
        } else if ($pontuacaoTotal < 260) {
            $nivelNovo = 2;
        } else if ($pontuacaoTotal < 700) {
            $nivelNovo = 3;
        } else {
            $nivelNovo = 4;
        }

        try {
            // Atualiza a pontuação e o nível do usuário no banco de dados
            $resultado = PerfilDao::setPontuacaoNivel($id, $pontuacaoTotal, $nivelNovo);

            if ($resultado) {
                echo "Atualização feita com sucesso! pontuacao: ".$pontuacaoTotal." nivel: ".$nivelNovo. " perfil ".$id ;
            } else {
                echo "Erro ao atualizar o nível e a pontuação do usuário";
            }
        } catch (PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        }
    } else {
        echo "Dados inválidos recebidos";
    }
} else {
    echo "Método de requisição inválido";
}
?>
