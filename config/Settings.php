<?php

namespace Settings;


    class Settings{

        
        public static function getSettings(): array {
//            $str  = file_get_contents(dirname(__FILE__).'/config.json');
            return array(
                'host' => 'postgres',
                'user' => 'default',
                'password' => 'secret',
                'port' => '5432',
                'database' =>  'gymdb'
            );
        }
    }
