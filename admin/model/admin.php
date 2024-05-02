<?php

class Admin
{
    //Variaveis do banco da tabela admin
    public $codAdmin, $nomeAdmin, $emailAdmin, $senhaAdmin;

    public function getCodAdmin()
    {
        return $this->codAdmin;
    }
    public function setCodUsuario($codAdmin)
    {
        $this->codAdmin = $codAdmin;
    }
    public function getNomeAdmin()
    {
        return $this->nomeAdmin;
    }
    public function setNomeAdmin($nomeAdmin)
    {
        $this->nomeAdmin = $nomeAdmin;
    }
    public function getEmailAdmin()
    {
        return $this->codAdmin;
    }
    public function setEmailAdmin($emailAdmin)
    {
        $this->emailAdmin = $emailAdmin;
    }
    public function getSenhaAdmin()
    {
        return $this->senhaAdmin;
    }
    public function setSenhaAdmin($senhaAdmin)
    {
        $this->senhaAdmin = $senhaAdmin;
    }
}
