<?php

namespace App\Controllers;


    use Repository\Treino;
    use Repository\Aparelho;
    use Repository\Exercicio;

    class PersonalController extends ControllerManager{

/* ----------------------------- EXERCICIOS ----------------------------------- */

        public function criarExercicio(){
            $result = [];

            if (!$this->checkRequest($this->post, array("nome", "series", "repeticoes", "descanso", "maquina"))){
                return $this->badRequest();
            }

            $exercicio = new Exercicio();
            $result = $exercicio->novoExercicio($_POST);

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function buscaExercicio(){
            if (!$this->checkRequest($this->get, array("nome"))){
                return $this->badRequest();
            }

            $exercicio = new Exercicio();
            $result = $exercicio->buscarExercicio($_GET["nome"]);

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function mostrarExercicios(){
            $exercicio = new Exercicio();

            $result = $exercicio->mostrarExercicios();

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function deletarExercicio(){
            if (!$this->checkRequest($this->post, array("nome"))){
                return $this->badRequest();
            }

            $exercicio = new Exercicio();
            $result = $exercicio->deletarExercicio($_POST["nome"]);

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

/* ----------------------------- APARELHOS ----------------------------------- */

        public function buscaAparelho(){
            if (!$this->checkRequest($this->get, array("codigo"))){
                return $this->badRequest();
            }

            $aparelho = new Aparelho();
            $result = $aparelho->buscarAparelho($_GET["codigo"]);

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function mostrarAparelhos(){
            $aparelho = new Aparelho();

            $result = $aparelho->mostrarAparelhos();

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function adicionarAparelho(){
            if (!$this->checkRequest($this->post, array("nome", "musculo", "identificacao"))){
                return $this->badRequest();
            }

            $aparelho = new Aparelho();

            $result = $aparelho->novoAparelho($_POST);

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function deletarAparelho(){
            if (!$this->checkRequest($this->post, array("codigo"))){
                return $this->badRequest();
            }

            $aparelho = new Aparelho();
            $result = $aparelho->deletarAparelho($_POST["codigo"]);

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

/* ----------------------------- TREINOS ----------------------------------- */

        public function criarTreino(){
            $result = [];

            if (!$this->checkRequest($this->post, array("rg_aluno", "dia", "exercicios"))){
                return $this->badRequest();
            }

            $treino = new Treino();
            $result = $treino->novoTreino($_POST);

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function deletarTreino(){
            if (!$this->checkRequest($this->post, array("rg_aluno"))){
                return $this->badRequest();
            }

            $treino = new Treino();
            $result = $treino->deletarTreino($_POST["rg_aluno"]);

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function buscaTreinoAluno(){
            if (!$this->checkRequest($this->get, array("rg_aluno"))){
                return $this->badRequest();
            }

            $treino = new Treino();
            $result = $treino->buscarTreinoPorAluno($_GET["rg_aluno"]);

            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function pg_array_parse($s, $start = 0, &$end = null)
        {
            if (empty($s) || $s[0] != '{') return null;
            $return = array();
            $string = false;
            $quote='';
            $len = strlen($s);
            $v = '';
            for ($i = $start + 1; $i < $len; $i++) {
                $ch = $s[$i];

                if (!$string && $ch == '}') {
                    if ($v !== '' || !empty($return)) {
                        $return[] = $v;
                    }
                    $end = $i;
                    break;
                } elseif (!$string && $ch == '{') {
                    $v = $this->pg_array_parse($s, $i, $i);
                } elseif (!$string && $ch == ','){
                    $return[] = $v;
                    $v = '';
                } elseif (!$string && ($ch == '"' || $ch == "'")) {
                    $string = true;
                    $quote = $ch;
                } elseif ($string && $ch == $quote && $s[$i - 1] == "\\") {
                    $v = substr($v, 0, -1) . $ch;
                } elseif ($string && $ch == $quote && $s[$i - 1] != "\\") {
                    $string = false;
                } else {
                    $v .= $ch;
                }
            }

            return $return;
        }

    }