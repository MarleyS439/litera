<?php

class Item
{
    // variaveis do banco
    public $codItem, $codTipoItem, $nomeItem, $valor, $imagemItem;
    // funcoes
    public function getCodItem()
    {
        return $this->codItem;
    }
    public function setCodItem($codItem)
    {
        $this->$codItem = $codItem;
    }
    public function getCodTipoItem()
    {
        return $this->codTipoItem;
    }
    public function setCodTipoItem($codTipoItem)
    {
        $this->$codTipoItem = $codTipoItem;
    }
    public function getNomeItem()
    {
        return $this->nomeItem;
    }
    public function setItem($nomeItem)
    {
        $this->$nomeItem = $nomeItem;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor)
    {
        $this->$valor = $valor;
    }
    public function getImagemItem()
    {
        return $this->codItem;
    }
    public function setImagemItem($imagemItem)
    {
        $this->$imagemItem = $imagemItem;
    }
}
