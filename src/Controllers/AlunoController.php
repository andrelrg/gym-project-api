<?php

namespace App\Controllers;


    use Repository\Agendamento;

    class AlunoController extends ControllerManager{
    
        public function criarAgendamento(){
            if (!$this->checkRequest($this->post, array("personal_rg", "aluno_rg", "academia_nome", "dia", "hora"))){
                return $this->badRequest();
            }

            $agendamento = new Agendamento();
            $result = $agendamento->novoAgendamento($_POST);

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function buscaAgendamento(){
            if (!$this->checkRequest($this->get, array("rg", "tipo"))){
                return $this->badRequest();
            }

            $agendamento = new Agendamento();
            $result = $agendamento->buscarAgendamento($_GET["tipo"], $_GET["rg"]);


            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;

        }
    }