<?php
/**
 * @package  MFTPlugin
 */
namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

/**
 *
 */
class Admin extends BaseController
{
    public $settings_api;

    private $adminCallbacks;

    private $pages = [];

    private $subpages = [];

    public function register()
    {
        $this->settings_api = new SettingsApi();

        $this->adminCallbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings_api->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
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

    public function setSubpages()
    {

        $this->subpages = [
            [
                'parent_slug' => 'mft_settings',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_cpt',
                'callback' => [$this->adminCallbacks, 'adminCPT'],
            ],
            [
                'parent_slug' => 'mft_settings',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_taxonomies',
                'callback' => [$this->adminCallbacks, 'adminTaxonomies'],
            ],
            [
                'parent_slug' => 'mft_settings',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_widgets',
                'callback' => [$this->adminCallbacks, 'adminWidgets'],
            ],
        ];
    }

    // public function admin_index()
    // {
    //     //page template'
    //     require_once $this->plugin_path . "templates/admin.php";
    // }

    public function setSettings()
    {

        $args = [
            [
                'option_group' => 'mft_options_group',
                'option_name' => 'text_example',
                'callback' => [$this->adminCallbacks, 'mftOptionGroup'],
            ],
            [
                'option_group' => 'mft_options_group',
                'option_name' => 'first_name',
            ],
        ];

        $this->settings_api->setSettings($args);

    }

    public function setSections()
    {

        $args = [
            [
                'id' => 'mft_admin_index',
                'title' => 'MFT Settings',
                'callback' => [$this->adminCallbacks, 'mftAdminSection'],
                'page' => 'mft_settings',
            ],
        ];

        $this->settings_api->setSections($args);
    }

    public function setFields()
    {

        $args = [
            [
                'id' => 'text_example', //id decided for the field is settings option_name
                'title' => 'Text Example',
                'callback' => [$this->adminCallbacks, 'mftTextExample'],
                'page' => 'mft_settings',
                'section' => 'mft_admin_index',
                'args' => [
                    'label_for' => 'text_example',
                    'class' => 'example-class',
                ],
            ],

            [
                'id' => 'first_name', //id decided for the field is settings option_name
                'title' => 'First Name',
                'callback' => [$this->adminCallbacks, 'mftFirstName'],
                'page' => 'mft_settings',
                'section' => 'mft_admin_index',
                'args' => [
                    'label_for' => 'first_name',
                    'class' => 'example-class',
                ],
            ],
        ];

        $this->settings_api->setFields($args);

    }
}
