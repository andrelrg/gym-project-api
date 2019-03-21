<?php

namespace Components\Database;

    use Settings\Settings;

    /**
     * Classe resposável por Conectar ao banco MySql.
     * 
     * @author André Gapar <and_lrg@hotmail.com>
     */
    class MySqlConnector{

        protected $conn;
        private $conString = "mysql:host=%s;port=%s;dbname=%s";
        
        function __construct(){
            $this->connect();
        }

        protected function connect(){
            $set = Settings::getSettings();

            $conString = sprintf(
                $this->conString,
                $set['host'],
                $set['port'],
                $set['database']
            );


            $this->conn = new \PDO(
                $conString, 
                $set['user'],
                $set['password']
            );

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        public function close(){
            $this->conn = null;
        }
    
    }
?>