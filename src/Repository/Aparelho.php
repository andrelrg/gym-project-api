<?php

namespace Repository;

use Components\Database\PostgreSQL;

class Aparelho{

    function __construct(){
    }

    public function buscarAparelho($codigo){
        if (!$codigo) {
            return false;
        }

        $raw = "SELECT * FROM Aparelhos WHERE (aparelho).Codigo = '$codigo';";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw, true);

        $postgre->close();

        return $result;
    }

    public function novoAparelho($data){
        if (empty($data)) {
            return false;
        }
        extract($data);

        $raw = "insert into Aparelhos (aparelho.Codigo, aparelho.Nome, aparelho.Musculo, aparelho.Identificacao) values 
            ('$codigo', '$nome', '$musculo', '$identificacao');";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw);

        $postgre->close();

        return $result;
    }

    public function mostrarAparelhos(){
        $raw = "SELECT * FROM Aparelhos;";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw, true);

        $postgre->close();

        return $result;
    }

    public function deletarAparelho($codigo){
        if (!$codigo) {
            return false;
        }

        $raw = "DELETE FROM Aparelhos WHERE (aparelho).Codigo = '$codigo';";

        $postgre = new PostgreSQL();
        $result = $postgre->executeRawSql($raw);

        $postgre->close();

        return $result;
    }

}

?>