
<?php

require_once 'C:\Turma2\xampp\htdocs\projeto_vida\Model\TesteModel.php';

class TestePersonalidadeController
{
    private $model;
    public function __construct($pdo)
    {
        $this->model = new TestePersonalidadeModel($pdo);
    }

    public function registrarResposta($id_pergunta, $iduser, $valor) {

       $this->model->registrarResposta($id_pergunta, $iduser, $valor);
            
    }

    public function listarPerguntas() {
        return $this->model->listarPerguntas();
    }

    function obterCaracteristicas(array $respostas): array {
        // Mapeamento de características por pergunta e valor de resposta
        $caracteristicas = [
            // Pergunta 1
            [
                -2 => "Evita pessoas",
                -1 => "Reservado",
                0 => "Neutro socialmente",
                1 => "Colaborativo",
                2 => "Ótimo com pessoas",
            ],
            // Pergunta 2
            [
                -2 => "Extremamente organizado", 
                -1 => "Planejador",
                0 => "Flexível",
                1 => "Espontâneo",
                2 => "Caótico",
            ],
            // Pergunta 3
            [
                -2 => "Evita riscos",
                -1 => "Cauteloso",
                0 => "Moderado",
                1 => "Corajoso",
                2 => "Aventureiro",
            ],
            // Pergunta 4
            [
                -2 => "Autoconsciente",
                -1 => "Introspectivo",
                0 => "Neutro emocionalmente",
                1 => "Reservado emocionalmente",
                2 => "Desconectado emocionalmente",
            ],
            // Pergunta 5
            [
                -2 => "Frágil sob estresse",
                -1 => "Ansioso",
                0 => "Reativo",
                1 => "Controlado",
                2 => "Inabalável",
            ],
        ];

        $resultado = [];


        foreach ($respostas as $indice => $valor) {
            // Garante que o valor está entre -2 e 2
            $valor = max(-2, min(2, $valor));
            // adiciona a caracteristica a Array $resultado,
            array_push($resultado,$caracteristicas[$indice][$valor]);
        }

        return $resultado;
    }
} 

?>