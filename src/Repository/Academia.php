<?php

namespace Repository;

use Components\Database\MySql;

class Academia{

    private $table = "Academia";
    private $id_academia;

    function __construct($id_academia = NULL){
        $this->id_academia = $id_academia;
    }

    public function buscarAcademia($nome){
        if (!$nome) {
            return false;
        }

        $raw = "select * from Academia where Nome = '$nome';";
        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function novoAcademia($data){

        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Academia values (Academia_TY('$nome',
                Endereco_TY('$rua', $numero, '$cidade', '$bairro', $cep, '$estado'),
                Telefone_NT(Telefone_TY($ddd, $telefone)),
                '$email', '$funcionamento_semana', '$funcionamento_sabado', '$funcionamento_domingo', '$funcionamento_feriado'));";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function mostrarAcademias(){

        $raw = "SELECT * FROM Academia;";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function deletarAcademia($nome){
        if (!$nome) {
            return false;
        }

        $raw = "DELETE FROM Academia WHERE Nome = '$nome';";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

}

?>