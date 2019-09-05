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
    
    function selectOcorrencias() {
        $stmt = $conexao->prepare("SELECT * FROM ocorrencias");
        $stmt->execute();
        
        $ocorrencias = array();
        while($row = $stmt->fetch()){
            array_push($ocorrencias, new Ocorrencia($row['id'], $row['tipo'],
                    $row['descricao'], $row['horario'], $row['coordenadaX'],
                    $row['coordenadaY']));
	}
        
        return $ocorrencias;
    }
    
    function selectOcorrenciaById($id) {
        $stmt = $conexao->prepare("SELECT * FROM ocorrencias WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        
        $ocorrencias = array();
        while($row = $stmt->fetch()){
            array_push($ocorrencias, new Ocorrencia($row['id'], $row['tipo'],
                    $row['descricao'], $row['horario'], $row['coordenadaX'],
                    $row['coordenadaY']));
	}
        
        return $ocorrencias;
    }
}