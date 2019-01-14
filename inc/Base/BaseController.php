<?php

namespace Inc\Base;

class BaseController{

    public $plugin_path;
    public $plugin_url;
    public $plugin;
    public $manager;
    public $t=[];

    function __construct(){
        $this->plugin_path = plugin_dir_path( dirname( __FILE__,2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__,2));
        $this->plugin = plugin_basename(dirname(__FILE__,3)).'/MFT.php';

        $this->manager = [
            'cpt_manager' => 'CPT Manager',
            'gallery_manager' => 'Gallery Manager'
        ];
    }

    public function activeModule(string $key)
    {
        $option = get_option('mft_plugin');
        
        return (isset($option[ $key]))?$option[ $key] : false;

    }
    
}