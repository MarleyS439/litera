<?php

class Usuario
{
    // variaveis do banco
    public $codUsuario, $nomeUsuario, $emailUsuario, $senhaUsuario, $pontuacaoUsuario, $dinheiroUsuario, $tutorial, $banido, $nivel, $dataCriacao, $dataModfc;
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
    public function setTutorial($tutorial)
    {
        $this->tutorial = $tutorial;
    }
    public function getBanido()
    {
        return $this->banido;
    }
    public function setBanido($banido)
    {
        $this->banido = $banido;
    }
    public function getNivel()
    {
        return $this->nivel;
    }
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;
    }
    public function getDataModfc()
    {
        return $this->dataModfc;
    }
    public function setDataModfc($dataModfc)
    {
        $this->dataModfc = $dataModfc;
    }
}
