<?php

namespace Repository;

use Components\Database\MySql;

class Agendamento{

    private $table = "Agendamento";
    private $id_aluno;
    private $id_personal;

    function __construct($id_personal = NULL, $id_aluno = NULL){
        $this->id_personal = $id_personal;
        $this->id_aluno = $id_aluno;
    }

    public function buscarAgendamento($tipo, $rg){
        if (!$rg && !$tipo) {
            return false;
        }

        if ($tipo == 'aluno') {
            $raw = "select * from Agendamento where RG = $rg;";
        } elseif ($tipo == 'personal'){
            $raw = "select * from Agendamento where RG = $rg;";
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

        $raw = "insert into Agendamento values (Agendamento_TY(1,
                TO_DATE('$dia','dd/mm/yyyy'), '$hora',
                (SELECT ref(a) FROM Aluno a WHERE a.RG = $personal_rg),
                (SELECT ref(p) FROM Personal p WHERE p.RG = $aluno_rg),
                (SELECT ref(ac) FROM Academia ac WHERE ac.Nome = 'academia_nome')));";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }
}

?>