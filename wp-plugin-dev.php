<?php
/*
Plugin Name: WP Plugin Development
Plugin URI: https://www.linkedin.com/in/shadhin-msa/
Description: Plugin for custom user post, taxonomy, gallery manager etc
Version: 0.1.0
Author: Md. Shahinur Alam
Author URI: https://www.linkedin.com/in/shadhin-msa/
*/

if(! defined('ABSPATH')){
    die;
}

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}


function activate_MFT_plugin(){
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_MFT_plugin');


function deactivate_MFT_plugin(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_MFT_plugin');


if(class_exists('Inc\\init')){
    Inc\Init::register_services();
}