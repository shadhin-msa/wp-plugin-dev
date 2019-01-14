<?php

namespace inc\base;

class Activate{
    public static function activate(){
        flush_rewrite_rules();

        self::setDefaultOptionData('mft_plugin');
        self::setDefaultOptionData('wppd_cpt');

        
    }
    public static function setDefaultOptionData( String $option_name)
    {
        if(!get_option($option_name)){
            
            update_option($option_name, []);
        }
    }
}

