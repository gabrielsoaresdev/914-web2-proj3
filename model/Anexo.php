<?php

class Anexo {
    private $id;
    private $caminho;
    private $ocorrenciaId;
    
    function __construct($id, $caminho, $ocorrenciaId) {
        $this->id = $id;
        $this->caminho = $caminho;
        $this->ocorrenciaId = $ocorrenciaId;
    }
    
    function getId() {
        return $this->id;
    }

    function getCaminho() {
        return $this->caminho;
    }

    function getOcorrenciaId() {
        return $this->ocorrenciaId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCaminho($caminho) {
        $this->caminho = $caminho;
    }

    function setOcorrenciaId($ocorrenciaId) {
        $this->ocorrenciaId = $ocorrenciaId;
    }
}
