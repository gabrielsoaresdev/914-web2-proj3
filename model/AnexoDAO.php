<?php

class AnexoDAO {
    private $conexao;
    
    function __construct() {
        $conexao = new PDO('mysql:host=localhost;dbname=db_proj3', 'root', '');
    }
    
    function insert(Anexo $anexo) {
        $stmt = $conexao->prepare("INSERT INTO anexos (caminho, ocorrencia_id)"
                . " VALUES (:c, :fk)");
        
        $stmt->bindValue(":c", $anexo->getCaminho());
        $stmt->bindValue(":fk", $anexo->getOcorrenciaId());
        
        $stmt->execute();
    }
    
    function selectAnexosByOcorrencia($ocorrenciaId) {
        $stmt = $conexao->prepare("SELECT * FROM anexos WHERE ocorrencia_id = :fk");
        $stmt->bindValue(":fk", $ocorrenciaId);
        $stmt->execute();
        
        $anexos = array();
        while($row = $stmt->fetch()){
            array_push($anexos, new Anexo($row['id'], $row['caminho'], $row['ocorrencia_id']));
	}
        
        return $anexos;
    }
}