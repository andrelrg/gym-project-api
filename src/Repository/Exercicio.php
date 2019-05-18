<?php

namespace App\Models;

use Components\Database\MySql;

class Exercicio{

    private $table = "Exercício";
    private $id_exercicio;

    function __construct($id_exercicio = NULL){
        $this->id_exercicio = $id_exercicio;
    }

    public function getExercicioId($nome){
        $field = array('id');
        $where = array('nome'=>$nome);
        $mysql = new MySql();

        $result = $mysql->select($this->table, $field, $where);
        $result = $result->current()['id'];

        $mysql->close();
        return $result;
    }

    public function novoExercicio($nome, $series, $repeticoes, $descanso, $maquina){
        $insert = array(
            'nome'=>$nome,
            'series'=>$series,
            'repetições'=>$repeticoes,
            'descanso'=>$descanso,
            'maquína'=>$maquina
        );

        $mysql = new MySql();

        $success = $mysql->insert($this->table, $insert);
        $mysql->close();

        return $success;
    }

}

?>