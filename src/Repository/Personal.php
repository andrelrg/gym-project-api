<?php

namespace Repository;

use Components\Database\MySql;

class Personal{

    private $table = "Personal";
    private $id_personal;
    private $id_usuario;

    function __construct($id_usuario = NULL, $id_personal = NULL){
        $this->id_usuario = $id_usuario;
        $this->id_personal = $id_personal;
    }

    public function buscarPersonal(){
        if (!$this->id_usuario && !$this->id_personal) {
            return false;
        }

        $sql = "SELECT * FROM ".$this->table." p INNER JOIN Usuario u ON u.id = p.id_usuario WHERE ";

        if ($this->id_usuario){
            $sql .= "p.id_usuario = ".$this->id_usuario;
        } else{
            $sql .= "p.id = ".$this->id_personal;
        }

        $mysql = new MySql();
        $result = $mysql->executeRawSql($sql);

        $mysql->close();
        return $result;
    }

    public function novoPersonal($data = []){
        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Personal values (Personal_TY($rg, '$nome', '$sobrenome', '$email', '$senha', '$sexo',
                Telefone_NT(Telefone_TY($ddd, $telefone)),
                Endereco_TY('$rua', $numero, '$cidade', '$bairro', $cep, '$estado'),
                '$especializacao', '$tempo_experiencia'));";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }
}

?>