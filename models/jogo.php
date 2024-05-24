<?php

class Jogo
{
    public $codJogo, $nomeJogo, $descJogo, $pontuacaoJogo, $codCategoria, $codNivel;

    public function getCodJogo()
    {
        return $this->codJogo;
    }
    public function setCodJogo($codJogo)
    {
        $this->$codJogo = $codJogo;
    }
    public function getNomeJogo()
    {
        return $this->nomeJogo;
    }
    public function setNomeJogo($nomeJogo)
    {
        $this->$nomeJogo = $nomeJogo;
    }
    public function getDescJogo()
    {
        return $this->descJogo;
    }
    public function setDescJogo($descJogo)
    {
        $this->$descJogo = $descJogo;
    }
    public function getPontuacaoJogo()
    {
        return $this->pontuacaoJogo;
    }
    public function setPontuacaoJogo($pontuacaoJogo)
    {
        $this->$pontuacaoJogo = $pontuacaoJogo;
    }
    public function getCodCategoria()
    {
        return $this->codCategoria;
    }
    public function setCodCategoria($codCategoria)
    {
        $this->$codCategoria = $codCategoria;
    }
    public function getCodNivel()
    {
        return $this->codNivel;
    }
    public function setCodNivel($codNivel)
    {
        $this->$codNivel = $codNivel;
    }
}
