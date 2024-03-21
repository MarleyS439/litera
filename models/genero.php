<?php
class Genero
{
    public $codGenero, $nomeGenero, $imgGenero, $tokenGenero;
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
