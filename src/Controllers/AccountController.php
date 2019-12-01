<?php

namespace App\Controllers;


    use Repository\Usuario;
    use Repository\Aluno;
    use Repository\Personal;

    class AccountController extends ControllerManager{
    
        public function criarUsuario(){
            $result = [];

            if (!$this->checkRequest($this->post, array("nome", "sobrenome", "email", "senha", "telefone", "rua", "numero", "cep", "cidade", "estado", "sexo"))){
                return $this->badRequest();
            }

            switch ($_POST["tipo"]){
                case "aluno":
                    if (!$this->checkRequest($this->post, array("objetivo", "peso", "altura", "med_braco_direito", "med_braco_esquerdo", "med_perna_direita", "med_perna_esquerda", "med_peito", "med_abdomen"))){
                        return $this->badRequest();
                    }
                    $aluno = new Aluno();
                    $result = $aluno->novoAluno($_POST);
                    break;

                case "personal":
                    if (!$this->checkRequest($this->post, array("especializacao", "tempo_experiencia"))){
                        return $this->badRequest();
                    }
                    $personal = new Personal();
                    $result = $personal->novoPersonal($_POST);
                    break;

                default:
                    break;
            }

            $result = mb_convert_encoding($result,"UTF-8","auto");
            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function buscaAlunos(){

            $usuario = new Usuario();
            $result = $usuario->buscarAlunos();

            $result = mb_convert_encoding($result,"UTF-8","auto");
            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;

        }

        public function buscaUsuario(){

            $usuario = new Usuario();
            $result = $usuario->buscarUsuario($_GET["rg"], $_GET["tipo"]);

            $result = mb_convert_encoding($result,"UTF-8","auto");
            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;

        }

        public function buscaPersonais(){

            $usuario = new Usuario();
            $result = $usuario->buscarPersonais();

            $result = mb_convert_encoding($result,"UTF-8","auto");
            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;

        }

        public function login(){
            $return = [];
            if (!$this->checkRequest($this->get, array("email", "senha"))){
                return $this->badRequest();
            }

            $usuario = new Usuario();

            $return = $usuario->login($_GET["email"], $_GET["senha"]);

            $return = mb_convert_encoding($return,"UTF-8","auto");
            $return = json_encode($return, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

        public function deletarUsuario(){
            if (!$this->checkRequest($this->post, array("rg", "type"))){
                return $this->badRequest();
            }

            $usuario = new Usuario();
            $result = $usuario->deletarUsuario($_POST["rg"], $_POST["type"]);

            $result = mb_convert_encoding($result,"UTF-8","auto");
            $return = json_encode($result, JSON_UNESCAPED_UNICODE);

            if ($return){
                echo $return;
                exit;
            }
            echo json_last_error_msg();
            exit;
        }

    }