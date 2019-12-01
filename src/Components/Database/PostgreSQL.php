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
            $result = pg_query($this->conn, $query);

            if  (!$result) {
                $return["status"] = "Error while execute Query";
            } else{
                $return["status"] = "Success!";
                $return["results"] = array();
                if ($return){
                    $i = 0;
                    while ($row = pg_fetch_array($result, $i)) {
                        $return["results"][] = $row;
                        $i++;
                    }
                }
            }

            return $return;
        }
    }
?>