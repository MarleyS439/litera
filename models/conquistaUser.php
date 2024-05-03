<?php

class ConquistaUser
{
    public $codConquistaUser, $codUsusario, $codConquista;

    public function getCodConquistaUser()
    {
        return $this->codConquistaUser;
    }
    public function setCodConquistaUser($codConquistaUser)
    {
        $this->$codConquistaUser = $codConquistaUser;
    }
    public function getCodUser()
    {
        return $this->codUsusario;
    }
    public function setCoduser($codUsusario)
    {
        $this->$codUsusario = $codUsusario;
    }
    public function getCodConquista()
    {
        return $this->codConquista;
    }
    public function setCodConquista($codConquista)
    {
        $this->$codConquista = $codConquista;
    }
}
