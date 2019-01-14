<?php

namespace Inc\Base;
use \Inc\Base\BaseController;
class Enqueue extends BaseController{
    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue']);
        // add_action('wp_enqueue_scripts', [$this, 'frontend_enqueue']);
    }

    function admin_enqueue()
    {
        // enqueue admin scripts and style
        wp_enqueue_style('mypluginstyle',$this->plugin_url.'assets/mft-admin_style.css' );
        wp_enqueue_script('mypluginstyle',$this->plugin_url.'assets/mft-admin_script.js' );
    }

    function frontend_enqueue()
    {
        // enqueue frontend scripts and style
        wp_enqueue_style('mypluginstyle',$this->plugin_url.'assets/mft-style.css');
        wp_enqueue_script('mypluginstyle',$this->plugin_url.'assets/mft-script.js');
    }
    
}

