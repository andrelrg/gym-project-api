<?php

namespace Repository;

use Components\Database\MySql;

class Agendamento{

    function __construct(){
    }

    public function buscarAgendamento($tipo, $rg){
        if (!$rg && !$tipo) {
            return false;
        }

        if ($tipo == 'aluno') {
            $raw = "select * from Agendamentos where (aluno).RG = $rg;";
        } elseif ($tipo == 'personal'){
            $raw = "select * from Agendamentos where (personal).RG = $rg;";
        }
        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function novoAgendamento($data = []){
        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Agendamentos (aluno, personal, academia, dia, hora) values 
                ((SELECT aluno FROM Alunos WHERE (usuario).RG = '$aluno_rg'),
                (SELECT personal FROM Personais WHERE (usuario).RG = '$personal_rg'),
                (SELECT academia FROM Academias WHERE (academia).Nome = '$academia_nome'),
                to_date('$dia','dd/mm/yyyy'), '$hora');";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }
}

?>