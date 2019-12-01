<?php

namespace Settings;


    class Settings{

        
        public static function getSettings(): array {
//            $str  = file_get_contents(dirname(__FILE__).'/config.json');
            return array(
                'host' => 'postgres',
                'user' => 'postgres',
                'password' => '',
                'port' => '5432',
                'database' =>  'gymdb'
            );
        }
    }
