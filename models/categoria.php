<?php

class Categoria
{
    public $codCategoria, $categoria;
    public function getCodCategoria()
    {
        return $this->codCategoria;
    }
    public function setCodCategoria($codCategoria)
    {
        $this->codCategoria = $codCategoria;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
}
