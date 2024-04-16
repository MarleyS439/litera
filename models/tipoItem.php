<?php
class TipoItem
{
    public $codTipoItem, $tipoItem;
    public  function getCodTipoItem()
    {
        return $this->codTipoItem;
    }
    public function setCodTipoItem($codTipoItem)
    {
        $this->codTipoItem = $codTipoItem;
    }
    public function getTipoItem()
    {
        return $this->tipoItem;
    }
    public function setTipoItem($tipoItem)
    {
        $this->tipoItem = $tipoItem;
    }
}
