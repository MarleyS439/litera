<?php
class Roupa
{
    public $codRoupa, $nomeRoupa, $precoRoupa, $imgRoupa,  $tokenRoupa;

    public function getCodRoupa()
    {
        return $this->codRoupa;
    }

    public function setCodRoupa($codRoupa)
    {
        $this->codRoupa = $codRoupa;
    }

    public function getNomeRoupa()
    {
        return $this->nomeRoupa;
    }

    public function setNomeRoupa($nomeRoupa)
    {
        $this->nomeRoupa = $nomeRoupa;
    }

    public function getPrecoRoupa()
    {
        return $this->precoRoupa;
    }

    public function setPrecoRoupa($precoRoupa)
    {
        $this->precoRoupa = $precoRoupa;
    }

    public function getImgRoupa()
    {
        return $this->imgRoupa;
    }

    public function setImgRoupa($imgRoupa)
    {
        $this->imgRoupa = $imgRoupa;
    }

    public function getTokenRoupa()
    {
        return $this->tokenRoupa;
    }

    public function setTokenRoupa($tokenRoupa)
    {
        $this->tokenRoupa = $tokenRoupa;
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
            $diretorio = __DIR__ . "/../assets/images/perfil/roupa/"; // Caminho absoluto para o diretório
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
