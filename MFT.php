<?php
/*
Plugin Name: Milgrom Family Tree
Plugin URI: https://milgromfamilytree.com
Description: Plugin for custom user post and family tree
Version: 0.1.0
Author: Md. Shahinur Alam
Author URI: https://www.linkedin.com/in/shadhin-msa/
*/

if(! defined('ABSPATH')){
    die;
}


Class MFT{

    public $plugin= "aaa";
    function __construct(){
        add_action('init', [$this, 'custom_post_type']);
        $this->plugin = plugin_basename(__FILE__);
        $this->register();
    
    }
    function register(){
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend']);
        add_action('admin_menu', [$this, 'add_admin_pages']);

        add_filter("plugin_action_links_$this->plugin", [$this,'settings_link']);
    }
    public function settings_link($links){
        $slink = '<a href="admin.php?page=mft-settings" >Settings</a>';
        array_push($links, $slink);
        return $links;
    }






    function activate(){
        $this->custom_post_type();
        flush_rewrite_rules();
    }

    function deactivate(){
        flush_rewrite_rules();

    }

    function uninstall(){

    }
    public function add_admin_pages(){
        add_menu_page("Family Tree Settings", "MFT Settings", "manage_options", "mft-settings", [$this, 'admin_index'], '
        dashicons-admin-tools', 100);        
    }

    public function admin_index(){
        //page template'
        require_once plugin_dir_path(__FILE__)."templates/admin.php";
    }

    function custom_post_type(){
        register_post_type('family-member', ['public' => true,'label'=>'Family Members']);
    }

    function enqueue_frontend(){
        wp_enqueue_style('mypluginstyle',plugins_url('/assets/mft-style.css', __FILE__) );
        wp_enqueue_script('mypluginstyle',plugins_url('/assets/mft-script.js', __FILE__) );
    }
    

    function enqueue_admin(){
        wp_enqueue_style('mypluginstyle',plugins_url('/assets/mft-admin_style.css', __FILE__) );
        wp_enqueue_script('mypluginstyle',plugins_url('/assets/mft-admin_script.js', __FILE__) );
    }
}

if(class_exists('MFT')){
    $MFT = new MFT();
}

//on activation
register_activation_hook(__FILE__, array($MFT, 'activate'));
//on deactivation
register_deactivation_hook(__FILE__, array($MFT, 'deactivate'));