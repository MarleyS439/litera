<?php
class Genero
{
    public $codGenero, $nomeGenero, $precoGenero, $imgGenero, $tokenGenero;

    public function getCodGenero()
    {
        return $this->codGenero;
    }

    public function setCodGenero($codGenero)
    {
        $this->codGenero = $codGenero;
    }

    public function getNomeGenero()
    {
        return $this->nomeGenero;
    }

    public function setNomeGenero($nomeGenero)
    {
        $this->nomeGenero = $nomeGenero;
    }

    public function getPrecoGenero()
    {
        return $this->precoGenero;
    }

    public function setPrecoGenero($precoGenero)
    {
        $this->precoGenero = $precoGenero;
    }

    public function getImgGenero()
    {
        return $this->imgGenero;
    }

    public function setImgGenero($imgGenero)
    {
        $this->imgGenero = $imgGenero;
    }

    public function getTokenGenero()
    {
        return $this->tokenGenero;
    }

    public function setTokenGenero($tokenGenero)
    {
        $this->tokenGenero = $tokenGenero;
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
            $diretorio = __DIR__ . "/../assets/images/perfil/genero/"; // Caminho absoluto para o diretório
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
