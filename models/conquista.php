<?php

class Conquista
{
    public $codConquista, $nomeConquista, $descConquista, $imgConquista, $tokenConquista;

    public function getCodConquista()
    {
        return $this->codConquista;
    }
    public function setCodConquista($codConquista)
    {
        $this->$codConquista = $codConquista;
    }
    public function getNomeConquista()
    {
        return $this->nomeConquista;
    }
    public function setNomeConquista($nomeConquista)
    {
        $this->$nomeConquista = $nomeConquista;
    }
    public function getDescConquista()
    {
        return $this->descConquista;
    }
    public function setDescConquista($descConquista)
    {
        $this->$descConquista = $descConquista;
    }
    public function getImgConquista()
    {
        return $this->imgConquista;
    }
    public function setImgConquista($imgConquista)
    {
        $this->$imgConquista = $imgConquista;
    }
    public function getTokenConquista()
    {
        return $this->tokenConquista;
    }
    public function setTokenConquista($tokenConquista)
    {
        $this->$tokenConquista = $tokenConquista;
    }
}
