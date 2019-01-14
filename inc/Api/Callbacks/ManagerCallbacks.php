<?php

/**
 * @package MFT
 *
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitizer($input)
    {
        $output = [];

        foreach ($this->manager as $key => $value) 
        {        
            $output[$key] =  ( isset($input[$key]) ) ? ( $input[$key] )?true:false : false ; 
        }
        return $output;
    }
 
    public function adminIndexSection()
    {
        echo "Manage plugin section by activating or deactivating throug  the following settings";
    }

    public function checkboxField($args)
    {
        // var_dump($args);
        //      array(2) { ["label_for"]=> string(11) "cpt_manager" ["class"]=> string(6) "toggle" }

        $name = $args['label_for'];
        $classes = $args['classes'];
        //value after submit
        $option_name     = $args['option_name'];
        $checked = (isset(get_option($option_name)[$name]))? get_option($option_name)[$name]: false;
        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="'.$option_name.'[' . $name . ']" value="1" class="" ' . ($checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }

}
