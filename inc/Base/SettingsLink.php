<?php

namespace inc\base;

use \Inc\Base\BaseController;

class SettingsLink extends BaseController
{
    
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", [$this,'settings_link']);
    }

    function settings_link($links)
    {
        $slink = '<a href="admin.php?page=mft-settings" >Settings</a>';
        array_push($links, $slink);
        return $links;
    }
    
}

