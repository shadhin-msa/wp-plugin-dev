<?php

/**
 * @package MFT
 *
 */

namespace Inc\Api\Callbacks;

class CptCallbacks
{
    public function cptSection()
    {
        echo "Add and remove custom post types";
    }

    public function cptSanitizer($input)
    {
        $option_name = 'wppd_cpt';

        $output = get_option($option_name);

        if (!$output || !is_array($output)) 
        {
            $output = [];
        }

        if (isset($_POST['remove'])) 
        {
            unset($output[$_POST['remove']]);

            return $output;
        }

        $output[$input['post_type']] = $input;

        // must initialize an empty array
        
        return $output;
    }

    public function textboxField($args)
    {

        $name = $args['label_for'];
        $placeholder = $args['placeholder'];
        $option_name = $args['option_name'];
        $value = '';
        if (isset($_POST['edit'])) {
            $value = (isset(get_option($option_name)[$_POST['edit']][$name])) ? get_option($option_name)[$_POST['edit']][$name]: false;
        }

        echo '<input type="text" value="' . $value . '" name="' . $option_name . '[' . $name . ']" placeholder="' . $placeholder . '" />';
    }

    public function checkboxField($args)
    {
        // var_dump($args);
        //      array(2) { ["label_for"]=> string(11) "cpt_manager" ["class"]=> string(6) "toggle" }

        $name = $args['label_for'];

        $classes = $args['classes'];

        //value after submit
        $option_name = $args['option_name'];

        $checked = false;

        if (isset($_POST['edit'])) 
        {
            $checked = (isset(get_option($option_name)[$_POST['edit']][$name]))?: false;
        }
        
        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ($checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }

}
