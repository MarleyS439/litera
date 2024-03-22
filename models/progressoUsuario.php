<?php

class ProgressoUsuario
{
    public $codProgressoUsuario, $codUsuario, $codJogo, $nivelAtual;

    public function getCodProgressoUsuario()
    {
        return $this->codProgressoUsuario;
    }
    public function setCodProgressoUsuario($codProgressoUsuario)
    {
        $this->$codProgressoUsuario = $codProgressoUsuario;
    }
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }
    public function setCodUsusario($codUsuario)
    {
        $this->$codUsuario = $codUsuario;
    }
    public function getCodJogo()
    {
        return $this->codJogo;
    }
    public function setCodJogo($codJogo)
    {
        $this->$codJogo = $codJogo;
    }
    public function getNivelAtual()
    {
        return $this->nivelAtual;
    }
    public function setNivelAtual($nivelAtual)
    {
        $this->$nivelAtual = $nivelAtual;
    }
}
