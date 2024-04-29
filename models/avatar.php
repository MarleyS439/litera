<?php
class Avatar
{
    public $codAvatar, $codCabelo, $codRoupa, $codGenero, $codUsuario;

    public function getCodAvatar()
    {
        return $this->codAvatar;
    }
    public function setCodAvatar($codAvatar)
    {
        $this->$codAvatar = $codAvatar;
    }
    public function getCodCabelo()
    {
        return $this->codCabelo;
    }
    public function setCodCabelo($codCabelo)
    {
        $this->$codCabelo = $codCabelo;
    }
    public function getCodRoupa()
    {
        return $this->codRoupa;
    }
    public function setCodRoupa($codRoupa)
    {
        $this->$codRoupa = $codRoupa;
    }
    public function getCodGenero()
    {
        return $this->codGenero;
    }
    public function setCodGenro($codGenero)
    {
        $this->$codGenero =  $codGenero;
    }
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }
    public function setCodUsuario($codUsuario)
    {
        $this->$codUsuario = $codUsuario;
    }
}