<?php

namespace Repository;

use Components\Database\MySql;

class Personal{

    function __construct(){
    }

    public function novoPersonal($data = []){
        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Personais (usuario, personal.Especializacao, personal.Tempo_experiencia) values 
                (('$rg', '$nome', '$sobrenome', '$email', '$senha', '$sexo',
                ARRAY[('$ddd', '$telefone')::Telefone_TY],
                ARRAY[('$rua', '$numero', '$cidade', '$bairro', '$cep', '$estado')::Endereco_TY]),
                '$especializacao', '$tempo_experiencia');";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }
}

?>