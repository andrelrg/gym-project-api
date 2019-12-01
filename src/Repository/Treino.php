<?php

namespace Repository;

use Components\Database\MySql;

class Treino{

    function __construct(){
    }

    public function buscarTreinoPorAluno($rg_aluno){
        if (!$rg_aluno) {
            return false;
        }

        $raw = "SELECT * FROM Treinos WHERE (usuario).RG = '$rg_aluno';";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function novoTreino($data){
        if (!$data) {
            return false;
        }

        $insert = array(
            'rg_aluno'=>$data['rg_aluno'],
            'exercicios'=>$data['exercicios'],
            'dia'=>$data['dia'] ?: 'NOW()',
        );

        if (empty($data)) {
            return false;
        }
        extract($data);

        foreach($exercicios as $exercicio){
            $rawAux[] = "(SELECT exercicio FROM Exercicios WHERE (exercicio).Nome = '$exercicio')::Exercicio_TY";
        }

        $raw = "insert into Treinos (dia, aluno, usuario, exercicio) values 
            ('$dia',
            (SELECT aluno FROM Alunos WHERE (usuario).RG = '$rg_aluno'),
            (SELECT usuario FROM Alunos WHERE (usuario).RG = '$rg_aluno'),
            ARRAY[".
                implode(', ', $rawAux)
            ."]);";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function deletarTreino($rg_aluno){
        if (!$rg_aluno) {
            return false;
        }

        $raw = "DELETE FROM Treinos WHERE (usuario).RG = '$rg_aluno';";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }
}

?>