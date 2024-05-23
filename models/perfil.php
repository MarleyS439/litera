<?php 
class Perfil
{
    // Atributos do banco de dados
    public $codPerfil, $codUsuario, $nomePerfil, $generoPerfil, $iconPerfil, $pontuacaoPerfil, $dinheiroPerfil, $tutorial, $nivel, $faseConcluida, $dataNasc, $dataCriacao, $dataModfc;

    // Métodos de acesso aos atributos
    public function getCodPerfil()
    {
        return $this->codPerfil;
    }
    public function setCodPerfil($codPerfil)
    {
        $this->codPerfil = $codPerfil;
    }
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;
    }

    public function getNomePerfil()
    {
        return $this->nomePerfil;
    }
    public function setNomePerfil($nomePerfil)
    {
        $this->nomePerfil = $nomePerfil;
    }
    
    public function getGeneroPerfil()
    {
        return $this->generoPerfil;
    }
    public function setGeneroPerfil($generoPerfil)
    {
        $this->generoPerfil = $generoPerfil;
    }
    public function getIconPerfil()
    {
        return $this->iconPerfil;
    }
    public function setIconPerfil($iconPerfil)
    {
        $this->iconPerfil = $iconPerfil;
    }
    
    public function getPontuacaoPerfil()
    {
        return $this->pontuacaoPerfil;
    }
    public function setPontuacaoPerfil($pontuacaoPerfil)
    {
        $this->pontuacaoPerfil = $pontuacaoPerfil;
    }

    public function getDinheiroPerfil()
    {
        return $this->dinheiroPerfil;
    }
    public function setDinheiroPerfil($dinheiroPerfil)
    {
        $this->dinheiroPerfil = $dinheiroPerfil;
    }

    public function getTutorial()
    {
        return $this->tutorial;
    }
    public function setTutorial($tutorial)
    {
        $this->tutorial = $tutorial;
    }

    public function getNivel()
    {
        return $this->nivel;
    }
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    public function getFasesConcluidas()
    {
        return $this->faseConcluida;
    }
    public function setFasesConcluidas($faseConcluida)
    {
        $this->faseConcluida = $faseConcluida;
    }
    public function getDataNasc()
    {
        return $this->dataNasc;
    }
    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;
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
?>