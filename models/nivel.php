<?php
class Nivel
{
    public $codNivel, $dificuldadeNivel, $nivel;

    public function getCodNivel()
    {
        return $this->codNivel;
    }
    public function setCodNivel($codNivel)
    {
        $this->codNivel = $codNivel;
    }
    public function getDificuldadeNivel()
    {
        return $this->dificuldadeNivel;
    }
    public function setDificuldadeNivel($dificuldadeNivel)
    {
        $this->dificuldadeNivel = $dificuldadeNivel;
    }
    public function getNivel()
    {
        return $this->nivel;
    }
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }
}
