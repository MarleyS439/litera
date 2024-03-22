<?php

class Usuario
{
    // variaveis do banco
    public $codUsuario, $nomeUsuario, $emailUsuario, $senhaUsuario, $pontuacaoUsuario, $dinheiroUsuario, $tutorial, $banido;
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

    public function getPontuacaoUsuario()
    {
        return $this->pontuacaoUsuario;
    }
    public function setPontuacaoUsuario($pontuacaoUsuario)
    {
        $this->pontuacaoUsuario = $pontuacaoUsuario;
    }

    public function getDinheiroUsuario()
    {
        return $this->dinheiroUsuario;
    }
    public function setDinheiroUsuario($dinheiroUsuario)
    {
        $this->dinheiroUsuario = $dinheiroUsuario;
    }

    public function getTutorial()
    {
        return $this->tutorial;
    }
    public function setTutorialUsuario($tutorial)
    {
        $this->tutorial = $tutorial;
    }
    public function getBanido(){
        return $this->banido;
    }
    public function setBanido($banido){
        $this->banido = $banido;
    }
}
