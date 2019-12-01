<?php

namespace Components\Database;

    use Settings\Settings;

    /**
     * Classe resposável por Conectar ao banco Postgres.
     * 
     * @author André Gapar <and_lrg@hotmail.com>
     */
    class PostgreSQLConnector{

        protected $conn;
        private $conString = "pgsql:host=%s port=%s dbname=%s user=%s password=%s";
        
        function __construct(){
            $this->connect();
        }

        protected function connect(){
            $set = Settings::getSettings();

            $conString = sprintf(
                $this->conString,
                $set['host'],
                $set['port'],
                $set['database'],
                $set['user'],
                $set['password']
            );

            // $this->conn = pg_connect($conString);

           $this->conn = new \PDO(
               $conString,
               $set['user'],
               $set['password']
           );

            if (!$this->conn) {
                die("Connection failed!");
            }
        }

        public function close(){
            $this->conn = NULL;
        }

    }
?>