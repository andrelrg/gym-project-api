<?php

namespace Repository;

use Components\Database\MySql;

class Aluno{

    function __construct(){
    }

    public function novoAluno($data = []){
        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Alunos (usuario, aluno.Objetivo, aluno.Peso, aluno.Altura, aluno.Med_braco_direito, aluno.Med_braco_esquerdo, aluno.Med_perna_direita, aluno.Med_perna_esquerda, aluno.Med_peito, aluno.Med_abdomen) values 
                (('$rg', '$nome', '$sobrenome', '$email', '$senha', '$sexo',
                ARRAY[('$ddd', '$telefone')::Telefone_TY],
                ARRAY[('$rua', '$numero', '$cidade', '$bairro', '$cep', '$estado')::Endereco_TY]),
                '$objetivo', $peso, $altura, $med_braco_direito, $med_braco_esquerdo, $med_perna_direita,
                $med_perna_esquerda, $med_peito, $med_abdomen);";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }
}

?>