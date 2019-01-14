<?php

/**
 * @package MFT
 * 
 */

 namespace Inc\Api\Callbacks;

 use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{

    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }
    
    public function adminCPT()
    {
        return require_once("$this->plugin_path/templates/cpt.php");
    }
    
    public function adminGallery()
    {
        return require_once("$this->plugin_path/templates/gallery.php");
    }
    
    public function adminTaxonomies()
    {
        return require_once("$this->plugin_path/templates/taxonomies.php");
    }
    
    // public function mftOptionGroup($input)
    // {
    //     //validate the input
    //     return $input;
    // }
    
    // public function mftAdminSection()
    // {
    //     echo "Nice settins section";
    // }
     
    // public function mftTextExample()
    // {
    //     //value after submit
    //     $value=esc_attr( get_option( 'text_example' ) ); 
    //     echo '<input type=""  class="regular-text" name="text_example" value="'.$value.'" placeholder="write something here" >';
    // }
    
    // public function mftFirstName()
    // {
    //     //value after submit
    //     $value=esc_attr( get_option( 'first_name' ) ); 
    //     echo '<input type=""  class="regular-text" name="first_name" value="'.$value.'" placeholder="write something here" >';
    // }
}