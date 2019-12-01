<?php

namespace Repository;

use Components\Database\PostgreSQL;

class Academia{

    function __construct(){
    }

    public function buscarAcademia($nome){
        if (!$nome) {
            return false;
        }

        $raw = "select * from Academias where (academia).Nome = '$nome';";
        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw, true);

        $postgre->close();

        return $result;
    }

    public function novoAcademia($data){

        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Academias (academia.Nome, academia.Endereco, academia.Telefone, academia.Email, academia.Funcionamento_semana, academia.Funcionamento_sabado, academia.Funcionamento_domingo, academia.Funcionamento_feriado) values 
                ('$nome',
                ARRAY[('$rua', '$numero', '$cidade', '$bairro', '$cep', '$estado')::Endereco_TY],
                ARRAY[('$ddd', '$telefone')::Telefone_TY],
                '$email', '$funcionamento_semana', '$funcionamento_sabado', '$funcionamento_domingo', '$funcionamento_feriado');";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw);

        $postgre->close();

        return $result;
    }

    public function mostrarAcademias(){

        $raw = "SELECT * FROM Academias;";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw, true);

        $postgre->close();

        return $result;
    }

    public function deletarAcademia($nome){
        if (!$nome) {
            return false;
        }

        $raw = "DELETE FROM Academias WHERE (academia).Nome = '$nome';";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw);

        $postgre->close();

        return $result;
    }

}

?>