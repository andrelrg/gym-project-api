<?php

namespace Repository;

use Components\Database\MySql;

class Usuario{

    function __construct(){
    }

    public function buscarUsuario($rg, $type){
        if (!$rg && !$type) {
            return false;
        }

        if ($type == 'aluno') {
            $raw = "select * from Alunos where (usuario).RG = $rg;";
        } elseif ($type == 'personal'){
            $raw = "select * from Personais where (usuario).RG = $rg;";
        }
        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function buscarAlunos(){

        $sql = "SELECT * FROM Alunos";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($sql);

        $mysql->close();

        return $result;
    }

    public function buscarPersonais(){

        $sql = "SELECT * FROM Personais";

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

        $raw = "insert into Pessoas (usuario.RG, usuario.Nome, usuario.Sobrenome, usuario.Email, usuario.Senha, usuario.Sexo, usuario.Telefone, usuario.Endereco) values 
                ('$rg', '$nome', '$sobrenome', '$email', '$senha', '$sexo',
                ARRAY[('$ddd', '$telefone')::Telefone_TY],
                ARRAY[('$rua', '$numero', '$cidade', '$bairro', '$cep', '$estado')::Endereco_TY]);";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function login($email, $senha){
        if (!$email || !$senha) {
            return false;
        }

        $raw = "SELECT usuario, 'aluno' as tipo FROM Alunos WHERE
                ((usuario).Email = '$email' AND (usuario).Senha = '$senha')
                UNION
                SELECT usuario, 'personal' as tipo FROM Personais WHERE
                ((usuario).Email = '$email' AND (usuario).Senha = '$senha')
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
            $raw = "delete from Alunos where (aluno).RG = $rg;";
        } elseif ($type == 'personal'){
            $raw = "delete from Personais where (personal).RG = $rg;";
        }
        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }
}

?>