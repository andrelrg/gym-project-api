<?php


namespace Components\Database;
    /**
     * Classe de abstração facilitadora para o uso do MySql.
     * 
     * @author André Gaspar <and_lrg@hotmail.com>
     */
    class PostgreSQL extends PostgreSQLConnector {

        /**
         * Função responsável por executar a query SQL
         * 
         * @param string query
         */
        public function executeRawSql($query, $return = false){
            $return = [];

            $result = $this->conn->query($query) or die($this->conn->error);;

            while($row = $result->fetch(\PDO::FETCH_ASSOC)) {
                $return[] = $row;
            }

            return $return;
        }
    }
?>