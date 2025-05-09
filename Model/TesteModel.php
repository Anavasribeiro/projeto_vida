<?php

class TestePersonalidadeModel
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function registrarResposta($id_pergunta, $id_user, $valor) {
        
        $sql = "INSERT INTO respostas_teste(id_pergunta, id_user, valor) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_pergunta, $id_user, $valor]);
    }

    public function listarPerguntas() {
        $sql = "SELECT * FROM perguntas_personalidade";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
