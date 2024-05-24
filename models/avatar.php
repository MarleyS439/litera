<?php
class Avatar
{
    public $codAvatar, $codCabelo, $codRoupa, $codGenero, $codPerfil;

    public function getCodAvatar()
    {
        return $this->codAvatar;
    }
    public function setCodAvatar($codAvatar)
    {
        $this->codAvatar = $codAvatar;
    }
    public function getCodCabelo()
    {
        return $this->codCabelo;
    }
    public function setCodCabelo($codCabelo)
    {
        $this->codCabelo = $codCabelo;
    }
    public function getCodRoupa()
    {
        return $this->codRoupa;
    }
    public function setCodRoupa($codRoupa)
    {
        $this->codRoupa = $codRoupa;
    }
    public function getCodGenero()
    {
        return $this->codGenero;
    }
    public function setCodGenero($codGenero)
    {
        $this->codGenero =  $codGenero;
    }
    public function getCodPerfil()
    {
        return $this->codPerfil;
    }
    public function setCodPerfil($codPerfil)
    {
        $this->codPerfil = $codPerfil;
    }
}
