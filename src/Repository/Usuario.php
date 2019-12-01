<?php

namespace Repository;

use Components\Database\MySql;

class Usuario{

    function __construct($id_usuario = NULL){
    }

    public function buscarUsuario($rg, $type){
        if (!$rg && !$type) {
            return false;
        }

        if ($type == 'aluno') {
            $raw = "select * from Aluno where RG = $rg;";
        } elseif ($type == 'personal'){
            $raw = "select * from Personal where RG = $rg;";
        }
        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function buscarAlunos(){

        $sql = "SELECT * FROM Aluno";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($sql);

        $mysql->close();

        return $result;
    }

    public function buscarPersonais(){

        $sql = "SELECT * FROM Personal";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($sql);

        $mysql->close();

        return $result;
    }

    public function novoUsuario($data = []){
        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Pessoas values (Usuario_TY($rg, '$nome', '$sobrenome', '$email', '$senha', '$sexo',
                Telefone_NT(Telefone_TY($ddd, $telefone)),
                Endereco_TY('$rua', $numero, '$cidade', '$bairro', $cep, '$estado')));";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function login($email, $senha){
        if (!$email || !$senha) {
            return false;
        }

        $raw = "SELECT a.RG, 'aluno' as tipo FROM Aluno a WHERE
                (a.Email = '$email' AND a.Senha = '$senha')
                UNION
                SELECT p.RG, 'personal' as tipo FROM Personal p WHERE
                (p.Email = '$email' AND p.Senha = '$senha')
                ";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function deletarUsuario($rg, $type){
        if (!$rg && !$type) {
            return false;
        }

        if ($type == 'aluno') {
            $raw = "delete from Aluno where RG = $rg;";
        } elseif ($type == 'personal'){
            $raw = "delete from Personal where RG = $rg;";
        }
        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }
}

?>