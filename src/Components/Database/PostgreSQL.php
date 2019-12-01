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
        public function executeRawSql($query, $showResults = false){
            $return = [];

            $result = $this->conn->query($query) or $return["result"] = $this->conn->error;;

            if ($result){
                $return["result"] = "success";
            }

            if ($showResults) {
                while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
                    $return["data"][] = str_replace(["'", "\\", '"'], '', $row);
                }
            }

            return $return;
        }
    }
?>