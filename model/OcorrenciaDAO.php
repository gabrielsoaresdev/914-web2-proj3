<?php

class OcorrenciaDAO {
    private $conexao;
    
    function __construct() {
        $conexao = new PDO('mysql:host=localhost;dbname=db_proj3', 'root', '');
    }
    
    function insert(Ocorrencia $ocorrencia) {
        $stmt = $conexao->prepare("INSERT INTO ocorrencias (tipo, descricao,"
                . " horario, coordenadaX, coordenadaY) VALUES (:t, :d, :h, :x, :y)");
        
        $stmt->bindValue(":t", $ocorrencia->getTipo());
        $stmt->bindValue(":d", $ocorrencia->getDescricao());
        $stmt->bindValue(":h", $ocorrencia->getHorario());
        $stmt->bindValue(":x", $ocorrencia->getCordenadaX());
        $stmt->bindValue(":y", $ocorrencia->getCordenadaY());
        
        $stmt->execute();
    }
}