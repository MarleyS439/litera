<?php
class Cabelo
{
    public $codCabelo, $nomeCabelo, $imgCabelo, $tokenCabelo;
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
    public function getImgCabelo()
    {
        return $this->imgCabelo;
    }
    public function setImgCabelo($imgCabelo)
    {
        $this->imgCabelo = $imgCabelo;
    }
    public function getTokencabelo()
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
