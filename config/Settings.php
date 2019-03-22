<?php

namespace Settings;


    class Settings{

        
        public static function getSettings(): array {
            $str  = file_get_contents(dirname(__FILE__).'/config.json');
            return json_decode($str, true);
        }
    }
