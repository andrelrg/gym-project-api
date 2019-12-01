<?php

namespace Repository;

use Components\Database\PostgreSQL;

class Exercicio{

    function __construct(){
    }

    public function buscarExercicio($nome){
        if (!$nome) {
            return false;
        }

        $raw = "SELECT * FROM Exercicios WHERE (exercicio).Nome = '$nome'";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw, true);

        $postgre->close();

        return $result;
    }

    public function novoExercicio($data){
        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Exercicios (aparelho, exercicio.Nome, exercicio.Series, exercicio.Repeticoes, exercicio.Descanso) values 
            ((SELECT aparelho FROM Aparelhos WHERE (aparelho).codigo = '$maquina'),
            '$nome', '$series', '$repeticoes', '$descanso');";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw);

        $postgre->close();

        return $result;
    }

    public function mostrarExercicios(){

        $sql = "SELECT * FROM Exercicios";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($sql, true);

        $postgre->close();

        return $result;
    }

    public function deletarExercicio($nome){
        if (!$nome) {
            return false;
        }

        $raw = "DELETE FROM Exercicios WHERE (exercicio).Nome = '$nome'";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw);

        $postgre->close();

        return $result;
    }

}

?>