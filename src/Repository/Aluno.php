<?php

namespace Repository;

use Components\Database\MySql;

class Aluno{

    private $table = "Aluno";
    private $id_aluno;
    private $id_usuario;

    function __construct($id_usuario = NULL, $id_aluno = NULL){
        $this->id_usuario = $id_usuario;
        $this->id_aluno = $id_aluno;
    }

    public function novoAluno($data = []){
        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Aluno values (Aluno_TY($rg, '$nome', '$sobrenome', '$email', '$senha', '$sexo',
                Telefone_NT(Telefone_TY($ddd, $telefone)),
                Endereco_TY('$rua', $numero, '$cidade', '$bairro', $cep, '$estado'),
                '$objetivo', $peso, $altura, $med_braco_direito, $med_braco_esquerdo, $med_perna_direita,
                $med_perna_esquerda, $med_peito, $med_abdomen));";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }
}

?>