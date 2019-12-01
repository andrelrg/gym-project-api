<?php

namespace Repository;

use Components\Database\MySql;

class Exercicio{

    function __construct(){
    }

    public function buscarExercicio($nome){
        if (!$nome) {
            return false;
        }

        $raw = "SELECT * FROM Exercicios WHERE (exercicio).Nome = '$nome'";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

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

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function mostrarExercicios(){

        $sql = "SELECT * FROM Exercicios";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($sql);

        $mysql->close();

        return $result;
    }

    public function deletarExercicio($nome){
        if (!$nome) {
            return false;
        }

        $raw = "DELETE FROM Exercicios WHERE (exercicio).Nome = '$nome'";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

}

?>