<?php

namespace inc\base;

class Activate{
    public static function activate(){
        flush_rewrite_rules();

        if(get_option('mft_plugin')){
            return;
        }
        
        $default = [];
        update_option('mft_plugin', $default);
    }
}

