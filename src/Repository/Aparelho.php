<?php

namespace App\Models;

use Components\Database\MySql;

class Aparelho{

    private $table = "Aparelho";
    private $nome_aparelho;

    function __construct($nome_aparelho = NULL){
        $this->nome_aparelho = $nome_aparelho;
    }

    public function getId(){
        $field = array('id');
        $where = array('nome'=>$this->nome_aparelho);
        $mysql = new MySql();

        $result = $mysql->select($this->table, $field, $where);
        $result = $result->current()['id'];

        $mysql->close();
        return $result;
    }

}

?>