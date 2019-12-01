<?php

namespace Repository;

use Components\Database\MySql;

class Aparelho{

    function __construct(){
    }

    public function getId(){
        return $this->id_aparelho;
    }

    public function buscarAparelho($codigo){
        if (!$codigo) {
            return false;
        }

        $raw = "SELECT * FROM Aparelhos WHERE (aparelho).Codigo = '$codigo';";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function novoAparelho($data){
        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Aparelhos (aparelho.Codigo, aparelho.Nome, aparelho.Musculo, aparelho.Identificacao) values 
            ('$codigo', '$nome', '$musculo', '$identificacao');";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function mostrarAparelhos(){
        $raw = "SELECT * FROM Aparelhos;";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

    public function deletarAparelho($codigo){
        if (!$codigo) {
            return false;
        }

        $raw = "DELETE FROM Aparelhos WHERE (aparelho).Codigo = '$codigo';";

        $mysql = new MySql();
        $result = $mysql->executeRawSql($raw);

        $mysql->close();

        return $result;
    }

}

?>