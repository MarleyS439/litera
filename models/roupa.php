<?php
class Roupa
{
    public $codRoupa, $nomeRoupa, $imgRoupa, $tokenRoupa;
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
        if (empty($_FILES['foto']['size']) != 1) {
            if ($novo_nome == "") {
                $novo_nome = md5(time()) . ".jpg";
            }
            $diretorio = "../../img/admin/";
            $nomeCompleto = $diretorio . $novo_nome;
            move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto);
            return $novo_nome;
        } else {
            return $novo_nome;
        }
    }
}
