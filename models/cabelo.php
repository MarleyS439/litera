<?php
class Cabelo
{
    public $codCabelo, $nomeCabelo, $precoCabelo, $imgCabelo, $tokenCabelo;

    public function getCodCabelo()
    {
        return $this->codCabelo;
    }

    public function setCodCabelo($codCabelo)
    {
        $this->codCabelo = $codCabelo;
    }

    public function getNomeCabelo()
    {
        return $this->nomeCabelo;
    }

    public function setNomeCabelo($nomeCabelo)
    {
        $this->nomeCabelo = $nomeCabelo;
    }

    public function getPrecoCabelo()
    {
        return $this->precoCabelo;
    }

    public function setPrecoCabelo($precoCabelo)
    {
        $this->precoCabelo = $precoCabelo;
    }

    public function getImgCabelo()
    {
        return $this->imgCabelo;
    }

    public function setImgCabelo($imgCabelo)
    {
        $this->imgCabelo = $imgCabelo;
    }

    public function getTokenCabelo()
    {
        return $this->tokenCabelo;
    }

    public function setTokenCabelo($tokenCabelo)
    {
        $this->tokenCabelo = $tokenCabelo;
    }

    public static function generateToken()
    {
        return bin2hex(random_bytes(16));
    }

    public static function salvarImagem($novo_nome)
    {
        $erro = "Erro: Nenhuma imagem foi enviada.";
        if ($_FILES['foto']['size'] > 0){
            $novo_nome = md5(time()). ".jpg";
            $diretorio = __DIR__ . "/../assets/images/perfil/cabelo/"; // Caminho absoluto para o diretório
            $nomeCompleto = $diretorio.$novo_nome;
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto)) {
                return $novo_nome; // Retorna o nome da imagem se for salva com sucesso
            } else {
                $erro = "Erro ao salvar a imagem.";
            }
        }
        return $erro; // Retorna mensagem de erro se não houver imagem para salvar
    }
}

