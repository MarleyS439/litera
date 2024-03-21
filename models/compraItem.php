<?php

class CompraItem
{
    public $codCompraItem, $codItem, $codUsuario, $dataCompra;

    public function getCodCompraItem()
    {
        return $this->codCompraItem;
    }
    public function setCodCompraItem($codCompraItem)
    {
        $this->codCompraItem = $codCompraItem;
    }
    public function getCodItem()
    {
        return $this->codItem;
    }
    public function setCodItem($codItem)
    {
        $this->codItem = $codItem;
    }
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;
    }
    public function getDataCompra()
    {
        return $this->dataCompra;
    }
    public function setDataCompra($dataCompra)
    {
        $this->dataCompra = $dataCompra;
    }
}
