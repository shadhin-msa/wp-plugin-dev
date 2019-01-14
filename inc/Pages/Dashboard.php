<?php
/**
 * @package  MFTPlugin
 */
namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

/**
 *
 */
class Dashboard extends BaseController
{
    public $settings_api;

    private $adminCallbacks;

    private $managerCallbacks;

    private $pages = [];

    private $subpages = [];

    public function register()
    {
        $this->settings_api = new SettingsApi();

        $this->adminCallbacks = new AdminCallbacks();

        $this->managerCallbacks = new ManagerCallbacks();

        $this->setPages();
        // $this->setSubpages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();
        $this->settings_api->addPages($this->pages)->withSubPage('Dashboard')->register();
    }

    public function setPages()
    {
        $this->pages = [
            [
                'page_title' => 'Family Tree Settings',
                'menu_title' => 'MFT Settings',
                'capability' => 'manage_options',
                'menu_slug' => 'mft_settings',
                'callback' => [$this->adminCallbacks, 'adminDashboard'],
                'icon_url' => 'dashicons-admin-tools',
                'position' => 9,
            ],
        ];

    }

    // public function setSubpages()
    // {

    //     $this->subpages = [
    //         [
    //             'parent_slug' => 'mft_settings',
    //             'page_title' => 'Custom Post Types',
    //             'menu_title' => 'CPT',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'alecaddd_cpt',
    //             'callback' => [$this->adminCallbacks, 'adminCPT'],
    //         ],
    //         [
    //             'parent_slug' => 'mft_settings',
    //             'page_title' => 'Custom Taxonomies',
    //             'menu_title' => 'Taxonomies',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'alecaddd_taxonomies',
    //             'callback' => [$this->adminCallbacks, 'adminTaxonomies'],
    //         ],
    //         [
    //             'parent_slug' => 'mft_settings',
    //             'page_title' => 'Custom Widgets',
    //             'menu_title' => 'Widgets',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'alecaddd_widgets',
    //             'callback' => [$this->adminCallbacks, 'adminWidgets'],
    //         ],
    //     ];
    // }

    // public function admin_index()
    // {
    //     //page template'
    //     require_once $this->plugin_path . "templates/admin.php";
    // }

    public function setSettings()
    {

        $args = [
            [
                'option_group' => 'mft_plugin_settings',
                'option_name' => 'mft_plugin',
                'callback' => [$this->managerCallbacks, 'checkboxSanitizer'],
            ]
        ];

        $this->settings_api->setSettings($args);

    }

    public function setSections()
    {

        $args = [
            [
                'id' => 'mft_admin_index',
                'title' => 'MFT Settings',
                'callback' => [$this->managerCallbacks, 'adminIndexSection'],
                'page' => 'mft_settings',
            ],
        ];

        $this->settings_api->setSections($args);
    }

    public function setFields()
    {
        $args = [];

        foreach ($this->manager as $key => $value) {
            $args[] = [

                'id' => $key,  //id decided for the field is settings option_name
                'title' => $value,
                'callback' => [$this->managerCallbacks, 'checkboxField'],
                'page' => 'mft_settings',
                'section' => 'mft_admin_index',
                'args' => [
                    'option_name'=> 'mft_plugin',
                    'label_for' => $key,
                    'classes' => 'ui-toggle'
                    ]   
                ];
        }

    //    var_dump($args);
        $this->settings_api->setFields($args);
       
    }
}
