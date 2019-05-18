<?php

namespace App\Controllers;


    use App\Models\Aparelho;
    use App\Models\Exercicio;

    class PersonalController extends ControllerManager{
    
        public function createExercice(){

            if (!$this->checkRequest($this->post, array("nome", "series", "repeticoes", "descanso", "maquina"))){
                return $this->badRequest();
            }

            $nome = $this->post["nome"];
            $series = $this->post["series"];
            $repeticoes = $this->post["repeticoes"];
            $descanso = $this->post["descanso"];

            $aparelho = new Aparelho($this->post["maquina"]);

            if ($aparelho){
                $maquina = $aparelho->getId();
            } else{
                return $this->notAllowed();
            }

            $exercicio = new Exercicio();

            if ($exercicio->novoExercicio($nome, $series, $repeticoes, $descanso, $maquina)){
                return $this->success("Novo exercicio adicionado");
            } else{
                return $this->badRequest();
            }
        }
    }