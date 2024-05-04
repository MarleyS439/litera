<?php

class Usuario
{
    // variaveis do banco
    public $codUsuario, $nomeUsuario, $emailUsuario, $senhaUsuario, $banido;
    // funcoes
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;
    }

    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }
    public function setNomeUsuario($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }
    public function setEmailUsuario($emailUsuario)
    {
        $this->emailUsuario = $emailUsuario;
    }

    public function getSenhaUsuario()
    {
        return $this->senhaUsuario;
    }
    public function setSenhaUsuario($senhaUsuario)
    {
        $this->senhaUsuario = $senhaUsuario;
    }
    public function getBanido()
    {
        return $this->banido;
    }
    public function setBanido($banido)
    {
        $this->banido = $banido;
    }
}
